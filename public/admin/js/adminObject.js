var adminObject = {
    showBanner : function (type, string) {
        $('.alert').remove();
        $('<div class="alert alert-'+type+'">'+string+'</div>').hide().insertBefore('#pad-wrapper').fadeIn(1000).delay(2000).fadeOut(1000);
    },
    clickRemoveRow : function(thisIdentity) {
        "use strict";
        $(document).on('click', thisIdentity, function(e) {
            e.preventDefault();
            if(confirm("Are you sure you want to delete item?")) {
                var thisObj = $(this);
                var thisUrl = thisObj.data('url');
                $.post(thisUrl, function(data) {
                    if(data && data.error) {
                        adminObject.showBanner('danger', 'You cannot delete this item. It\'s not empty.');
                    } else {
                        thisObj.closest('tr').remove();
                        adminObject.showBanner('success', 'Item has been successfully removed.');
                    }
                }, "json");
            }
        });
    },
    hideBanner : function(thisIdentity) {
        $(thisIdentity).delay(2000).fadeOut(1000);
    },
    sortableTable : function(thisIdentity) {
        if($(thisIdentity).length) {
            $(thisIdentity).nestedSortable({
                listType: 'tbody',
                handle: 'td:first-child',
                items: 'tr',
                toleranceElement: '> td',
                maxLevels: 1,
                sort: function() {
                    $('#save-order').fadeIn(3000);
                }
            });
        }
    },
    saveOrder : function(thisIdentity) {
        $(document).on('click', thisIdentity, function(e){
            e.preventDefault();
            var thisTbody = $('tbody.sortable');
            var thisUrl = thisTbody.data('url');
            var arraied = thisTbody.nestedSortable('toArray');
            $.post(thisUrl, { sortable: arraied }, function() {
                $(thisIdentity).fadeOut(1000);
                adminObject.showBanner('success', 'Items have been successfully rearranged.');
            });
        });
    },
    dPicker : function(thisIdentity) {
        if($(thisIdentity).length) {
            $(thisIdentity).datepicker();
        }
    },
    dTable : function(thisIdentity) {
        if($(thisIdentity).length) {
            $(thisIdentity).dataTable({
                'sPaginationType': 'full_numbers',
                'order': []
            });
        }
    },
    dataTableRemoveRow : function(thisIdentity) {
        "use strict";
        $(document).on('click', thisIdentity, function(e) {
            e.preventDefault();
            if(confirm("Are you sure you want to delete item?")) {
                var thisObj = $(this);
                var thisUrl = thisObj.data('url');
                $.post(thisUrl, function() {
                    var dataTable = thisObj.closest('table#example').DataTable();
                    dataTable.row( thisObj.parents('tr') ).remove().draw();
                    adminObject.showBanner('success', 'Item has been successfully removed.');
                });
            }
        });
    },
    dataTablePublish : function(thisIdentity) {
        "use strict";
        $(document).on('click', thisIdentity, function(e) {
            e.preventDefault();
            var thisObj = $(this);
            var thisUrl = thisObj.data('url');
            $.post(thisUrl, function() {
                thisObj.children('button').toggleClass('published unpublished');
            });
        });
    },
    switchSlider : function(thisIdentity) {
        "use strict";
        var inputField = $(thisIdentity).siblings('input');
        var inputVal = inputField.val();
        if (inputVal == 0) {
            $(thisIdentity).removeClass('on').html($(thisIdentity).data("off-text"));
        }
        $(document).on('click', thisIdentity, function(e) {
            if ($(this).hasClass("on")) {
                $(this).removeClass('on').html($(this).data("off-text"));
                inputField.val(0);
            } else {
                $(this).addClass('on').html($(this).data("on-text"));
                inputField.val(1);
            }
        });
    },
    makeSlug : function(thisIdentity) {
        "use strict";
        if($(thisIdentity).length) {
            var title = $("input#title");
            var titleVal, titleNew;
            title
                .on('focusin', function(){
                    titleVal = title.val();
                })
                .on('focusout', function() {
                    titleNew = title.val();
                    if (titleVal != titleNew) {
                        var thisObj = $(thisIdentity);
                        var thisUrl = thisObj.data('url');
                        $.post(thisUrl, { title: titleNew }, function(data) {
                            thisObj.val(data.slug);
                        }, 'json');
                    }
                });
        }
    },
    clickDelImg : function(thisIdentity) {
        "use strict";
        $(thisIdentity).on('click', function() {
            if(confirm("Are you sure you want to delete item? You can upload a new one afterwards.")) {
                var thisObj = $(this);
                var thisUrl = thisObj.data('url');
                $.post(thisUrl, function() {
                    var inputFile = thisObj.next('input');
                    var parText = inputFile.next('p');

                    thisObj.remove();
                    inputFile.fadeIn(1000);
                    if(parText.length) parText.fadeIn(1000);
                });
            }
        });
    },
    selectPortfolioCategories : function(thisIdentity) {
        "use strict";
        if($(thisIdentity).length) {
            $(thisIdentity).select2({
                placeholder: "Select a Category"
            });
        }
    },
    initCKEditor : function(thisIdentity) {
        "use strict";
        if($(thisIdentity).length) {
            $(thisIdentity).ckeditor();
        }
    },
    initBootstrapSelect : function(thisIdentity) {
        "use strict";
        if($(thisIdentity).length) {
            $(thisIdentity).selectpicker();
        }
    }
};