$(function() {
    "use strict";
    adminObject.hideBanner('div.content>div.alert');
    adminObject.clickRemoveRow('.clickRemoveRow');
    adminObject.sortableTable('.sortable');
    adminObject.saveOrder('#save-order');
    adminObject.dPicker('#start_date, #end_date, #completion_date');
    adminObject.dTable('#example');
    adminObject.dataTableRemoveRow('.dataTableRemoveRow');
    adminObject.dataTablePublish('.dataTablePublish');
    adminObject.switchSlider('.slider-button');
    adminObject.makeSlug('.make-slug');
    adminObject.clickDelImg('.delimg');
    adminObject.selectPortfolioCategories('.select2');
    adminObject.initCKEditor('textarea.editor');
    adminObject.initBootstrapSelect('.selectpicker');
});