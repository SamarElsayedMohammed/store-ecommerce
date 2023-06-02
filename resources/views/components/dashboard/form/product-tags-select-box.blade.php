<x-form.label for="Tags-of-products">Tags</x-form.label>
<input name='tags_outside' id="Tags-of-products" class='tagify--outside pr-2 pl-2 shadow-none border-0'
    placeholder='write tags to add below'>


@push('scripts')
    <script>
        var inputElmTag = document.querySelector('#Tags-of-products');

        const tagsList =
            {{ Js::from($tags) }};

        function tagTemplateTags(tagData) {
            return `
        <tag title="${(tagData.title || tagData.name)}"
                contenteditable='false'
                spellcheck='false'
                tabIndex="-1"
                class="${this.settings.classNames.tag} ${tagData.class ? tagData.class : ""}"
                ${this.getAttributes(tagData)}>
            <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
            <div class="d-flex align-items-center">
                <span class='tagify__tag-text'>${tagData.name}</span>
            </div>
        </tag>
    `
        }

        function suggestionItemTemplateTags(tagData) {
            return `
        <div ${this.getAttributes(tagData)}
            class='tagify__dropdown__item d-flex align-items-center ${tagData.class ? tagData.class : ""}'
            tabindex="0"
            role="option">

            <div class="d-flex flex-column">
                <strong>${tagData.name}</strong>
            </div>
        </div>
    `
        }

        // initialize Tagify on the above input node reference
        var tagify = new Tagify(inputElmTag, {
            tagTextProp: 'name', // very important since a custom template is used with this property as text. allows typing a "value" or a "name" to match input with whitelist
            enforceWhitelist: true,
            skipInvalid: true, // do not remporarily add invalid tags
            dropdown: {
                closeOnSelect: false,
                enabled: 0,
                classname: 'tags-list',
                searchKeys: ['name',
                    'value'
                ] // very important to set by which keys to search for suggesttions when typing
            },
            templates: {
                tag: tagTemplateTags,
                dropdownItem: suggestionItemTemplateTags
            },
            whitelist: tagsList
        })

        tagify.on('dropdown:show dropdown:updated', onDropdownShowTag)
        tagify.on('dropdown:select', onSelectSuggestionTag)

        var addAllSuggestionsElmTag;

        function onDropdownShowTag(e) {
            var dropdownContentElmTag = e.detail.tagify.DOM.dropdown.content;

            if (tagify.suggestedListItems.length > 1) {
                addAllSuggestionsElmTag = getAddAllSuggestionsElmTag();

                // insert "addAllSuggestionsElmTag" as the first element in the suggestions list
                dropdownContentElmTag.insertBefore(addAllSuggestionsElmTag, dropdownContentElmTag.firstChild)
            }
        }

        function onSelectSuggestionTag(e) {
            if (e.detail.elm == addAllSuggestionsElmTag)
                tagify.dropdown.selectAll.call(tagify);
        }

        // create a "add all" custom suggestion element every time the dropdown changes
        function getAddAllSuggestionsElmTag() {
            // suggestions items should be based on "dropdownItem" template
            return tagify.parseTemplate('dropdownItem', [{
                class: "addAll",
                name: "Add all",
                value: tagify.settings.whitelist.reduce(function(remainingSuggestionsTag, item) {
                    return tagify.isTagDuplicate(item.value) ? remainingSuggestionsTag :
                        remainingSuggestionsTag + 1
                }, 0) + " Members"
            }])
        }
    </script>
@endpush
