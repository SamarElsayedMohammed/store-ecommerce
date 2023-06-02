<x-form.label for="kt_tagify_users">Categories</x-form.label>
<input name='categories_outside' id="kt_tagify_users" class='tagify--outside pr-2 pl-2 shadow-none border-0'
    placeholder='write tags to add below'>

@push('scripts')
    <script>
        var inputElm = document.querySelector('#kt_tagify_users');

        const usersList =
            {{ Js::from($categories) }};

        function tagTemplate(tagData) {
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

        function suggestionItemTemplate(tagData) {
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
        var tagify = new Tagify(inputElm, {
            tagTextProp: 'name', // very important since a custom template is used with this property as text. allows typing a "value" or a "name" to match input with whitelist
            enforceWhitelist: true,
            skipInvalid: true, // do not remporarily add invalid tags
            dropdown: {
                closeOnSelect: false,
                enabled: 0,
                classname: 'users-list',
                searchKeys: ['name',
                    'id'
                ] // very important to set by which keys to search for suggesttions when typing
            },
            templates: {
                tag: tagTemplate,
                dropdownItem: suggestionItemTemplate
            },
            whitelist: usersList
        })

        tagify.on('dropdown:show dropdown:updated', onDropdownShow)
        tagify.on('dropdown:select', onSelectSuggestion)

        var addAllSuggestionsElm;

        function onDropdownShow(e) {
            var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

            if (tagify.suggestedListItems.length > 1) {
                addAllSuggestionsElm = getAddAllSuggestionsElmCats();

                // insert "addAllSuggestionsElm" as the first element in the suggestions list
                dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild)
            }
        }

        function onSelectSuggestion(e) {
            if (e.detail.elm == addAllSuggestionsElm)
                tagify.dropdown.selectAll.call(tagify);
        }

        // create a "add all" custom suggestion element every time the dropdown changes
        function getAddAllSuggestionsElmCats() {
            // suggestions items should be based on "dropdownItem" template
            return tagify.parseTemplate('dropdownItem', [{
                class: "addAllCat",
                name: "Add all",
                value: tagify.settings.whitelist.reduce(function(remainingSuggestionsCats, item) {
                    return tagify.isTagDuplicate(item.value) ? remainingSuggestionsCats :
                        remainingSuggestionsCats + 1
                }, 0) + " Members"
            }])
        }
    </script>
@endpush
