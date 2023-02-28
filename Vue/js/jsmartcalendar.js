var __jscPopupEmpty = null;

// Options __jscPopupOptions
var __jscPopupOptions =
        {
            popupStyleId: '__jsmartcalendar-popup-id',
            popupStyleClass: '__jsmartcalendar-popup-class',
            popupInnerContentStyleClass: '__jsmartcalendar-popup-inner-class',
            popupFormNewStyleClass: '__jsmartcalendar-popup-form-new-class',
            popupBtnNewStyleClass: '__jsmartcalendar-popup-btn-new-class',
            popupCellContainerStyleClass: '__jsc-popup-container',
            //popupCellRootJsonUrl : 'jsmartcalendar-data.json',
            popupCellRootJsonUrl: 'http://localhost/pfe/web/app_dev.php/evenementdate/',
            popupFormNewPageUrl: 'jsmartcalendar-new-entry.php'
        };

// Style CSS : __jscPopupCss
var __jscPopupCss =
        {
            'position': 'absolute',
            'width': '400px',
            'top': '0',
            'left': '0',
            'background-color': 'grey',
            'z-index': '99',
            'font-size': '80%'
        };

// Style CSS : __jscPopupInnerCss
var __jscPopupInnerCss =
        {
            'position': 'relative',
            'top': '0',
            'bottom': '0',
            'padding': '25px',
            'margin': '25px',
            'border': '1px solid gray',
            'background-color': 'white',
            'z-index': '99'
        };

var __jscPopupFormNewCss =
        {
            'position': 'relative',
            'padding': '5px',
            'margin': '25px',
            'border': '1px solid gray',
            'background-color': 'white'
        };
var __jscPopupBtnNewCss =
        {
            'position': 'relative',
            'padding': '5px',
            'margin': '5px',
            'cursor': 'pointer',
            'border': '1px solid white',
            'border-radius': '10px',
            'color': 'white',
            'text-align': 'center'
        };

var __jscPopupBtnCloseCss =
        {
            'position': 'absolute',
            'top': '0',
            'right': '0',
            'cursor': 'pointer',
            'padding': '2px',
            'margin': '2px',
            'border': '1px solid gray',
            'border-radius': '100px',
            'background-color': 'white',
            'text-align': 'center'
        };


// set original default values
var __jscDefaultOptions =
        {
            showToolTipe: true,
            showNewNoteForm: true,
            showNotesList: true,
            newNoteFormAction: '',
            noteCellColor: 'green',
            noteCellStyleClass: 'jsmartcalendar'
        };
// set global values to default;
var _jscDefaultOptions = __jscDefaultOptions;

function _initJSmartCalendar() {
    __jscPopupEmpty = $('<div/>', {
        'id': __jscPopupOptions['popupStyleId'],
        'class': __jscPopupOptions['popupStyleClass'],
        'html': ''
    });
    __jscPopupEmpty.css(__jscPopupCss);
}
function jSmartCalendar(scContainer) {
    jSmartCalendar(scContainer, null);
}
function jSmartCalendar(scContainer, scOptions) {
    _initJSmartCalendar();
    // set default option if null
    if (scOptions == null) {
        scOptions = new Array();
    }
    for (var i in _jscDefaultOptions) {
        if (scOptions[i] == null) {
            scOptions[i] = _jscDefaultOptions[i];
        } else {
            _jscDefaultOptions[i] = scOptions[i];
        }
    }

    // Set jQuery ui datepicker
    scContainer.datepicker(
            {
                beforeShowDay: function(date) {
                    var dateStr = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
                    var eDateClassIDCss = scOptions['noteCellStyleClass'] + '-' + dateStr;
                    var eDateClassCss = scOptions['noteCellStyleClass'] + ' ' + eDateClassIDCss;
                    setTimeout(function() {
                        $('.' + eDateClassIDCss).each(function() {
                            $(this).unbind('click');
                            $(this).attr('data-jsc_date', dateStr);
                            $(this).attr('data-jsc_CID', eDateClassIDCss);
                            var _cellHeight = $(this).height() + 'px';
                            var _cellWidth = $(this).width() + 'px';
                            var _elemToClickOn = $('<div/>', {
                                'class': 'jsc-click-on-over-cell'
                            });
                            _elemToClickOn.css({
                                'display': 'block',
                                'position': 'absolute',
                                'height': _cellHeight,
                                'width': _cellWidth,
                                'z-index': 10,
                                'cursor': 'pointer'
                            });

                            // prepend & bind Click
                            $(this).prepend(_elemToClickOn);
                            _jscClickCell(_elemToClickOn);

                        });

                    }, 1000);
                    return [true, eDateClassCss, ''];
                }
            });

}
function _jscClickCell(jscECell) {
    jscECell.on('click', function() {
        var eCellNote = $(this);
        var jscCellDate = eCellNote.attr('data-jsc_date');
        var jscCellClassID = eCellNote.attr('data-jsc_CID');

        _jscOpenCellPopup(eCellNote);
//        console.log({
//            'jscCellDate': jscCellDate,
//            'jscCellClassID': jscCellClassID
//        });

    });
    return false;
}
function _jscOpenCellPopup(jscECell) {
    __jscPopupEmpty.hide();
    var _jscECellPaprent = jscECell.parent();
    if (_jscECellPaprent.find('.' + __jscPopupOptions['popupCellContainerStyleClass']).length == 0) {
        _jscECellPaprent.append('<div class="' + __jscPopupOptions['popupCellContainerStyleClass'] + '"></div>');
    }
    _jscECellPaprent.find('.' + __jscPopupOptions['popupCellContainerStyleClass']).css({
        'position': 'relative',
        'width': '0',
        'height': '0'
    })
            .append(__jscPopupEmpty);
    __jscPopupEmpty.html('');
    
    //console.log(_jscECellPaprent.attr('data-jsc_date'));
    /* Set popup content */
    var _celleDate = _jscECellPaprent.attr('data-jsc_date');
    var _celleDateF = _celleDate.replace(new RegExp("\\\-", "g"),'/')
    //console.log(_celleDateF);
    _jscBindCellPopupContent(_celleDateF);

}

function _jscBindCellPopupContent(dateCell) {

    // set to empty + reinit css rules
    __jscPopupEmpty.html('');
    __jscPopupEmpty.css(__jscPopupCss);

    var _jscPopupEmpty_Inner = $('<div/>', {
        'class': __jscPopupOptions['popupInnerContentStyleClass'],
        'html': ''
    });
    _jscPopupEmpty_Inner.css(__jscPopupInnerCss);
    __jscPopupEmpty.append(_jscPopupEmpty_Inner);

    // add Form bloc for new note
    var _jscPopupEmpty_FormNewIframe = $('<iframe/>', {
        'src': __jscPopupOptions['popupFormNewPageUrl'],
        'style': 'border:0;'
    });
    var _jscPopupEmpty_FormNewWrapper = $('<div/>', {
        'class': __jscPopupOptions['popupFormNewStyleClass']
    });
    _jscPopupEmpty_FormNewWrapper.css(__jscPopupFormNewCss);
    _jscPopupEmpty_FormNewWrapper.hide();
    _jscPopupEmpty_FormNewWrapper.append(_jscPopupEmpty_FormNewIframe)
    __jscPopupEmpty.append(_jscPopupEmpty_FormNewWrapper);

    // add Form new show button
    var _jscPopupEmpty_ButtonNew = $('<div/>', {
        'class': __jscPopupOptions['popupBtnNewStyleClass'],
        'html': 'ajout note'
    });
    _jscPopupEmpty_ButtonNew.css(__jscPopupBtnNewCss)
    _jscPopupEmpty_ButtonNew.click(function() {
        _jscPopupEmpty_FormNewWrapper.fadeIn(500);
        return false;
    });
    //__jscPopupEmpty.append(_jscPopupEmpty_ButtonNew);

    // add Form new show button
    var _jscPopupEmpty_ButtonClose = $('<div/>', {
        'class': __jscPopupOptions['popupBtnNewStyleClass'],
        'html': 'X',
        'title': 'Fermer'
    });
    _jscPopupEmpty_ButtonClose.css(__jscPopupBtnCloseCss);
    _jscPopupEmpty_ButtonClose.click(function() {
        __jscPopupEmpty.fadeOut(500);
        return false;
    });
    __jscPopupEmpty.append(_jscPopupEmpty_ButtonClose);


    // Get Json content
//    $.getJSON(__jscPopupOptions['popupCellRootJsonUrl'], function(data) {
//        var items = [];
//
//        $.each(data, function(key, val) {
//            var subItems = [];
//            var subItemTitle = val['title'];
//            var subItemTitleTrc = subItemTitle;
//            if (subItemTitle.length > 30) {
//                subItemTitleTrc = subItemTitle.substr(0, 30) + ' ...';
//            }
//            $.each(val, function(subKey, subVal) {
//                subItems.push('<p class="' + subKey + '">' + subVal + '</p>');
//            });
//
//            var subItemsHtml = $('<div/>', {
//                'class': 'jsc-note-sub-content',
//                'html': subItems.join('')
//            });
//            items.push('<h3 title="' + subItemTitle + '">' + subItemTitleTrc + '</h3><div class="' + subItemsHtml.attr('class') + '">' + subItemsHtml.html() + '</div>');
//        });
//
//
//
//        });

    //getHtmlContent
    var _jsc_note_content = $('<div/>', {
        'class': 'jsc-note-content jsc-with-ui-accordion',
        'html': ''
    });
    console.log(__jscPopupOptions['popupCellRootJsonUrl']+dateCell);
    _jsc_note_content.load(__jscPopupOptions['popupCellRootJsonUrl']+dateCell, function() {
        _jsc_note_content.accordion({heightStyle: 'content'});
        _jsc_note_content.appendTo(_jscPopupEmpty_Inner);
        /* Show popup content */
        __jscPopupEmpty.draggable();
        __jscPopupEmpty.hide().fadeIn('slow');
        __jscPopupEmpty.unbind('click');
    });
}