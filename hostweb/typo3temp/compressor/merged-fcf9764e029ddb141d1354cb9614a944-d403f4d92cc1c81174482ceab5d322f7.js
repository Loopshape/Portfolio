
/* taken from powermail, thanks */

/* plugin for resize of grid in single container */
Ext.namespace('Ext.ux.plugin');
Ext.ux.plugin.FitToParent = Ext.extend(Object, {
    constructor : function(parent) {
        this.parent = parent;
    },
    init : function(c) {
        c.on('render', function(c) {
            c.fitToElement = Ext.get(this.parent
                    || c.getPositionEl().dom.parentNode);
            if (!c.doLayout) {
                this.fitSizeToParent();
                Ext.EventManager.onWindowResize(this.fitSizeToParent, this);
            }
        }, this, {
            single : true
        });
        if (c.doLayout) {
            c.monitorResize = true;
            c.doLayout = c.doLayout.createInterceptor(this.fitSizeToParent);
        }
    },
    fitSizeToParent : function() {
        // Uses the dimension of the current viewport, but removes the document header
        // and an additional margin of 40 pixels (e.g. Safari needs this addition)

        this.fitToElement.setHeight(Ext.getBody().getHeight() - this.fitToElement.getTop() - 40);
        var pos = this.getPosition(true), size = this.fitToElement.getViewSize();
        this.setSize(size.width - pos[0], size.height - pos[1]);

    }
});
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Markus Blaschke <typo3@markus-blaschke.de> (metaseo)
 *  (c) 2013 Markus Blaschke (TEQneers GmbH & Co. KG) <blaschke@teqneers.de> (tq_seo)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
Ext.ns('MetaSeo');

MetaSeo = {

    /**
     * Check if entry is in list
     */
    inList: function(list, item) {
        return new RegExp(' ' + item + ' ').test(' ' + list + ' ');
    },

    /**
     * Highlight text in grid
     *
     * @copyright	Stefan Gehrig (TEQneers GmbH & Co. KG) <gehrig@teqneers.de>
     */
    highlightText: function(node, search, cls) {
        search		= search.toUpperCase();
        var skip	= 0;
        if (node.nodeType == 3) {
            var pos = node.data.toUpperCase().indexOf(search);
            if (pos >= 0) {
                var spannode		= document.createElement('span');
                spannode.className	= cls || 'metaseo-search-highlight';
                var middlebit		= node.splitText(pos);
                var endbit			= middlebit.splitText(search.length);
                var middleclone		= middlebit.cloneNode(true);
                spannode.appendChild(middleclone);
                middlebit.parentNode.replaceChild(spannode, middlebit);
                skip = 1;
            }
        } else if (node.nodeType == 1 && node.childNodes && !/(script|style)/i.test(node.tagName)) {
            for (var i = 0; i < node.childNodes.length; ++i) {
                i += MetaSeo.highlightText(node.childNodes[i], search);
            }
        }
        return skip;
    },

    /**
     * Check if highlight text is available
     *
     * @copyright	Markus Blaschke (TEQneers GmbH & Co. KG) <blaschke@teqneers.de>
     */
    highlightTextExists: function(value, search) {
        search		= search.toUpperCase();
        var skip	= 0;

        var pos = value.toUpperCase().indexOf(search);
        if (pos >= 0) {
            return true;
        }

        return false;
    }
}
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Markus Blaschke <typo3@markus-blaschke.de> (metaseo)
 *  (c) 2013 Markus Blaschke (TEQneers GmbH & Co. KG) <blaschke@teqneers.de> (tq_seo)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

Ext.ns('MetaSeo.overview');

Ext.onReady(function(){
    Ext.QuickTips.init();
    Ext.state.Manager.setProvider(new Ext.state.CookieProvider());

    MetaSeo.overview.grid.init();
});

MetaSeo.overview.grid = {

    _cellEditMode: false,
    _fullCellHighlight: true,

    gridDs: false,
    grid: false,

    filterReload: function() {

        MetaSeo.overview.conf.criteriaFulltext = Ext.getCmp('searchFulltext').getValue();
        MetaSeo.overview.conf.sysLanguage = Ext.getCmp('sysLanguage').getValue();
        MetaSeo.overview.conf.depth = Ext.getCmp('listDepth').getValue();

        this.gridDs.reload();
    },

    storeReload: function() {
        MetaSeo.overview.conf.criteriaFulltext = Ext.getCmp('searchFulltext').getValue();
        MetaSeo.overview.conf.sysLanguage = Ext.getCmp('sysLanguage').getValue();
        MetaSeo.overview.conf.depth = Ext.getCmp('listDepth').getValue();

        this.gridDs.reload();
    },

    init: function() {
        // Init
        var me = this;

        /****************************************************
         * settings
         ****************************************************/
        switch( MetaSeo.overview.conf.listType ) {
            case 'metadata':
                this._cellEditMode = true;
                break;

            case 'geo':
                this._cellEditMode = true;
                break;

            case 'searchengines':
                this._fullCellHighlight = false;
                this._cellEditMode = true;
                break;

            case 'url':
                this._fullCellHighlight = false;
                this._cellEditMode = true;
                break;

            case 'advanced':
                this._fullCellHighlight = true;
                this._cellEditMode = true;
                break;

            case 'pagetitle':
                this._cellEditMode = true;
                this._fullCellHighlight = false;
                break;

            case 'pagetitlesim':
                this._fullCellHighlight = false;
                break;

            default:
                // Not defined
                return;
                break;
        }

        /****************************************************
         * grid storage
         ****************************************************/
        this.gridDs = this._createGridDs();

        /****************************************************
         * column model
         ****************************************************/
        var columnModel = this._createGridColumnModel();


        /****************************************************
         * grid panel
         ****************************************************/
        var grid = new Ext.grid.GridPanel({
            layout: 'fit',
            renderTo: MetaSeo.overview.conf.renderTo,
            store: this.gridDs,
            loadMask: true,
            plugins: [new Ext.ux.plugin.FitToParent()],
            columns: columnModel,
            stripeRows: true,
            height: 350,
            width: '98%',
            frame: true,
            border: true,
            disableSelection: false,
            title: MetaSeo.overview.conf.lang.title,
            viewConfig: {
                forceFit: true,
                listeners: {
                    refresh: function(view) {
                        if (!this._fullCellHighlight && !Ext.isEmpty(MetaSeo.overview.conf.criteriaFulltext)) {
                            view.el.select('.x-grid3-body .x-grid3-cell').each(function(el) {
                                MetaSeo.highlightText(el.dom, MetaSeo.overview.conf.criteriaFulltext);
                            });
                        }
                    }
                }
            },
            tbar: [
                MetaSeo.overview.conf.lang.labelSearchFulltext,
                {
                    xtype: 'textfield',
                    id: 'searchFulltext',
                    fieldLabel: MetaSeo.overview.conf.lang.labelSearchFulltext,
                    emptyText : MetaSeo.overview.conf.lang.emptySearchFulltext,
                    listeners: {
                        specialkey: function(f,e){
                            if (e.getKey() == e.ENTER) {
                                me.filterReload(this);
                            }
                        }
                    }
                },
                '->',
                MetaSeo.overview.conf.lang.labelSearchPageLanguage,
                {
                    xtype: 'combo',
                    id: 'sysLanguage',
                    fieldLabel: MetaSeo.overview.conf.lang.labelSearchPageLanguage,
                    emptyText : MetaSeo.overview.conf.lang.emptySearchPageLanguage,
                    listeners: {
                        select: function(f,e){
                            me.filterReload(this);
                        }
                    },
                    forceSelection: true,
                    editable: false,
                    mode: 'local',
                    triggerAction: 'all',
                    store: new Ext.data.ArrayStore({
                        id: 0,
                        fields: [
                            'id',
                            'label',
                            'flag'
                        ],
                        data: MetaSeo.overview.conf.dataLanguage
                    }),
                    valueField: 'id',
                    displayField: 'label',
                    tpl: '<tpl for="."><div class="x-combo-list-item">{flag}{label}</div></tpl>',
                    value: MetaSeo.overview.conf.sysLanguage
                }
            ],
            bbar: [
                MetaSeo.overview.conf.lang.labelDepth,
                {
                    xtype: 'combo',
                    id: 'listDepth',
                    listeners: {
                        select: function(f,e){
                            me.storeReload(this);
                        }
                    },
                    forceSelection: true,
                    editable: false,
                    mode: 'local',
                    triggerAction: 'all',
                    value : MetaSeo.overview.conf.depth,
                    store: new Ext.data.ArrayStore({
                        id: 0,
                        fields: [
                            'id',
                            'label'
                        ],
                        data: [
                            [1, 1],
                            [2, 2],
                            [3, 3],
                            [4, 4],
                            [5, 5]
                        ]
                    }),
                    valueField: 'id',
                    displayField: 'label'
                }
            ]
        });
        this.grid = grid;

        var editWindow = false;

        if( this._cellEditMode ) {
            grid.addClass('metaseo-grid-editable');

            grid.on('cellclick', function(grid, rowIndex, colIndex, e) {
                var record        = grid.getStore().getAt(rowIndex);
                var fieldName     = grid.getColumnModel().getDataIndex(colIndex);
                var fieldId       = grid.getColumnModel().getColumnId(colIndex);
                var col           = grid.getColumnModel().getColumnById(fieldId);
                var data          = record.get(fieldName);
                var overlayStatus = record.get('_overlay')[fieldName];

                // overlayStatus = 2 => only in base
                // overlayStatus = 1 => value from overlay
                // overlayStatus = 0 => value from base

                var title = record.get('title');

                // Fire custom MetaSEO onClick event
                if( col.metaSeoOnClick ) {
                    col.metaSeoOnClick(record, fieldName, fieldId, col, data);
                }

                // Auto. MetaSEO Click Edit field
                if( col.metaSeoClickEdit ) {
                    // Init editor field
                    var field = col.metaSeoClickEdit;
                    field.itemId = 'form-field';

                    if( !field.width)	field.width = 375;

                    switch( field.xtype ) {
                        case 'textarea':
                            if( !field.height)	field.height = 150;
                            field.value = data;
                            break;

                        case 'checkbox':
                            if( data == '0' || data == '' ) {
                                field.checked = false;
                            } else {
                                field.checked = true;
                            }
                            break;

                        default:
                            field.value = data;
                            break;
                    }

                    // Init editor window
                    var editWindow = new Ext.Window({
                        xtype: 'form',
                        width: 420,
                        height: 'auto',
                        modal: true,
                        title: title+': '+col.header,
                        items: [ field ],
                        buttons: [
                            {
                                text: MetaSeo.overview.conf.lang.button_save,
                                itemId: 'form-button-save',
                                disabled: true,
                                handler: function(cmp, e) {
                                    grid.loadMask.show();

                                    var pid = record.get('uid');
                                    var fieldValue = editWindow.getComponent('form-field').getValue();

                                    var callbackFinish = function(response) {
                                        var response = Ext.decode(response.responseText);

                                        if( response && response.error ) {
                                            TYPO3.Flashmessage.display(TYPO3.Severity.error, '', Ext.util.Format.htmlEncode(response.error) );
                                        }

                                        grid.getStore().load();
                                    };

                                    Ext.Ajax.request({
                                        url: MetaSeo.overview.conf.ajaxController + '&cmd=updatePageField',
                                        params: {
                                            pid             : Ext.encode(pid),
                                            field           : Ext.encode(fieldName),
                                            value           : Ext.encode(fieldValue),
                                            sysLanguage     : Ext.encode( MetaSeo.overview.conf.sysLanguage ),
                                            mode            : Ext.encode( MetaSeo.overview.conf.listType ),
                                            sessionToken    : Ext.encode( MetaSeo.overview.conf.sessionToken )
                                        },
                                        success: callbackFinish,
                                        failure: callbackFinish
                                    });

                                    editWindow.destroy();
                                }
                            },{
                                text: MetaSeo.overview.conf.lang.button_cancel,
                                handler: function(cmp, e) {
                                    editWindow.destroy();
                                }
                            }
                        ]
                    });
                    editWindow.show();

                    var formField		= editWindow.getComponent('form-field');
                    var formButtonSave	= editWindow.getFooterToolbar().getComponent('form-button-save');

                    // add listeners
                    formField.on('valid', function() {
                        formButtonSave.setDisabled(false);
                    });

                    formField.on('invalid', function() {
                        formButtonSave.setDisabled(true);
                    });


                }
            });
        }

    },


    _createGridDs: function() {
        var me = this;

        var gridDsColumns = [
            {name: 'uid', type: 'int'},
            {name: 'title', type: 'string'},
            {name: '_depth', type: 'int'},
            {name: '_overlay', type: 'array'}
        ];

        switch( MetaSeo.overview.conf.listType ) {
            case 'metadata':
                gridDsColumns.push(
                    {name: 'keywords', type: 'string'},
                    {name: 'description', type: 'string'},
                    {name: 'abstract', type: 'string'},
                    {name: 'author', type: 'string'},
                    {name: 'author_email', type: 'string'},
                    {name: 'lastupdated', type: 'string'}
                );
                break;

            case 'geo':
                gridDsColumns.push(
                    {name: 'tx_metaseo_geo_lat', type: 'string'},
                    {name: 'tx_metaseo_geo_long', type: 'string'},
                    {name: 'tx_metaseo_geo_place', type: 'string'},
                    {name: 'tx_metaseo_geo_region', type: 'string'}
                );
                break;

            case 'searchengines':
                gridDsColumns.push(
                    {name: 'tx_metaseo_canonicalurl', type: 'string'},
                    {name: 'tx_metaseo_is_exclude', type: 'string'},
                    {name: 'tx_metaseo_priority', type: 'string'}
                );
                break;

            case 'url':
                gridDsColumns.push(
                    {name: 'alias', type: 'string'},
                    {name: 'url_scheme', type: 'string'}
                );

                if( MetaSeo.overview.conf.realurlAvailable ) {
                    gridDsColumns.push(
                        {name: 'tx_realurl_pathsegment', type: 'string'},
                        {name: 'tx_realurl_pathoverride', type: 'string'},
                        {name: 'tx_realurl_exclude', type: 'string'}
                    );
                }
                break;

            case 'advanced':
                gridDsColumns.push(
                    {name: 'metatag', type: 'string'}
                );
                break;

            case 'pagetitle':
                gridDsColumns.push(
                    {name: 'tx_metaseo_pagetitle', type: 'string'},
                    {name: 'tx_metaseo_pagetitle_rel', type: 'string'},
                    {name: 'tx_metaseo_pagetitle_prefix', type: 'string'},
                    {name: 'tx_metaseo_pagetitle_suffix', type: 'string'}
                );
                break;

            case 'pagetitlesim':
                gridDsColumns.push(
                    {name: 'title_simulated', type: 'string'}
                );
                break;
        }

        var gridDs = new Ext.data.Store({
            storeId: 'MetaSeoOverviewRecordsStore',
            autoLoad: true,
            remoteSort: true,
            url: MetaSeo.overview.conf.ajaxController + '&cmd=getList',
            reader: new Ext.data.JsonReader({
                    totalProperty: 'results',
                    root: 'rows'
                },
                gridDsColumns
            ),
            sortInfo: {
                field	 : 'uid',
                direction: 'DESC'
            },
            baseParams: {
                pid						: Ext.encode( MetaSeo.overview.conf.pid ),
                pagerStart				: Ext.encode( 0 ),
                pagingSize				: Ext.encode( MetaSeo.overview.conf.pagingSize ),
                sortField				: Ext.encode( MetaSeo.overview.conf.sortField ),
                depth					: Ext.encode( MetaSeo.overview.conf.depth ),
                listType				: Ext.encode( MetaSeo.overview.conf.listType ),
                sessionToken			: Ext.encode( MetaSeo.overview.conf.sessionToken ),
                sysLanguage             : Ext.encode( MetaSeo.overview.conf.sysLanguage )
            },
            listeners: {
                beforeload: function() {
                    this.baseParams.pagingSize          = Ext.encode( MetaSeo.overview.conf.pagingSize );
                    this.baseParams.depth               = Ext.encode( MetaSeo.overview.conf.depth );
                    this.baseParams.criteriaFulltext    = Ext.encode( MetaSeo.overview.conf.criteriaFulltext );
                    this.baseParams.sysLanguage         = Ext.encode( MetaSeo.overview.conf.sysLanguage );
                    this.removeAll();
                }
            }
        });

        return gridDs;
    },


    _createGridColumnModel: function() {
        var me = this;

        var fieldRenderer = function(value, metaData, record, rowIndex, colIndex, store) {
            var fieldName     = me.grid.getColumnModel().getDataIndex(colIndex);
            var overlayStatus = record.get('_overlay')[fieldName];
            var qtip          = value;

            var currentLanguage = Ext.getCmp('sysLanguage').getRawValue();

            if( overlayStatus == 2 ) {
                qtip = '<b>' + String.format(MetaSeo.overview.conf.lang.value_base_only, currentLanguage) + '</b>:<br>' + qtip;
            } else if( overlayStatus == 1 ) {
                qtip = '<b>' + String.format(MetaSeo.overview.conf.lang.value_from_overlay, currentLanguage) + '</b>:<br>' + qtip;
            } else {
                qtip = '<b>' + String.format(MetaSeo.overview.conf.lang.value_from_base, currentLanguage) + '</b>:<br>' + qtip;
            }

            var html = me._fieldRendererCallback(value, qtip, 23, true);

            // check for overlay
            if( overlayStatus == 2 ) {
                html = '<div class="metaseo-info-only-in-base">'+html+'</div>';
            } else if( overlayStatus == 1 ) {
                html = '<div class="metaseo-info-from-overlay">'+html+'</div>';
            } else {
                html = '<div class="metaseo-info-from-base">'+html+'</div>';
            }

            return html;
        };

        var fieldRendererRaw = function(value, metaData, record, rowIndex, colIndex, store) {
            return me._fieldRendererRaw(value);
        };

        var fieldRendererBoolean = function(value, metaData, record, rowIndex, colIndex, store) {
            if( value == 0 || value == '' ) {
                value = '<div class="metaseo-boolean">'+Ext.util.Format.htmlEncode(MetaSeo.overview.conf.lang.boolean_no)+'</div>';
            } else {
                value = '<div class="metaseo-boolean"><strong>'+Ext.util.Format.htmlEncode(MetaSeo.overview.conf.lang.boolean_yes)+'</strong></div>';
            }

            return me._fieldRendererCallback(value, '', false, false);
        }

        var columnModel = [{
            id       : 'uid',
            header   : MetaSeo.overview.conf.lang.page_uid,
            width    : 'auto',
            sortable : false,
            dataIndex: 'uid',
            hidden	 : true
        }, {
            id       : 'title',
            header   : MetaSeo.overview.conf.lang.page_title,
            width    : 200,
            sortable : false,
            dataIndex: 'title',
            renderer: function(value, metaData, record, rowIndex, colIndex, store) {
                var qtip = value;

                if( record.data._depth ) {
                    value = new Array(record.data._depth).join('    ') + value;
                }

                return me._fieldRendererCallback(value, qtip, false, true);
            },
            metaSeoClickEdit	: {
                xtype: 'textfield',
                minLength: 3
            }
        }];

        switch( MetaSeo.overview.conf.listType ) {
            case 'metadata':

                var fieldRendererAdvEditor = function(value, metaData, record, rowIndex, colIndex, store) {
                    var qtip = Ext.util.Format.htmlEncode( MetaSeo.overview.conf.lang.metaeditor_button_hin );
                    return '<div class="metaseo-cell-editable metaseo-toolbar" ext:qtip="' + qtip +'">'+MetaSeo.overview.conf.sprite.editor+'</div>';
                }

                columnModel.push({
                    id			: 'keywords',
                    header		: MetaSeo.overview.conf.lang.page_keywords,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'keywords',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textarea'
                    }
                },{
                    id			: 'description',
                    header		: MetaSeo.overview.conf.lang.page_description,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'description',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textarea'
                    }
                },{
                    id			: 'abstract',
                    header		: MetaSeo.overview.conf.lang.page_abstract,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'abstract',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textarea'
                    }
                },{
                    id			: 'author',
                    header		: MetaSeo.overview.conf.lang.page_author,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'author',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                },{
                    id			: 'author_email',
                    header		: MetaSeo.overview.conf.lang.page_author_email,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'author_email',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield',
                        vtype: 'email'
                    }
                },{
                    id			: 'lastupdated',
                    header		: MetaSeo.overview.conf.lang.page_lastupdated,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'lastupdated',
                    renderer	: fieldRendererRaw,
                    metaSeoClickEdit	: {
                        xtype: 'datefield',
                        format: 'Y-m-d'
                    }
                });
//                ,{
//                    id       : 'metatag',
//                    header   : '',
//                    width    : 30,
//                    sortable : false,
//                    dataIndex: 'metatag',
//                    renderer	: fieldRendererAdvEditor,
//                    metaSeoOnClick: function(record, fieldName, fieldId, col, data) {
//
//                        // Init editor window
//                        var editWindow = new MetaSeo.metaeditor({
//                            t3PageTitle: record.get('title'),
//                            pid: record.get('uid'),
//                            onClose: function(reload) {
//                                // TODO: Move to listener/event
//                                if(reload) {
//                                    me.storeReload();
//                                }
//                            }
//                        });
//                        editWindow.show();
//                    }
//                });
                break;

            case 'geo':
                columnModel.push({
                    id			: 'tx_metaseo_geo_lat',
                    header		: MetaSeo.overview.conf.lang.page_geo_lat,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'tx_metaseo_geo_lat',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                },{
                    id			: 'tx_metaseo_geo_long',
                    header		: MetaSeo.overview.conf.lang.page_geo_long,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'tx_metaseo_geo_long',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                },{
                    id			: 'tx_metaseo_geo_place',
                    header		: MetaSeo.overview.conf.lang.page_geo_place,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'tx_metaseo_geo_place',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                },{
                    id			: 'tx_metaseo_geo_region',
                    header		: MetaSeo.overview.conf.lang.page_geo_region,
                    width		: 'auto',
                    sortable	: false,
                    dataIndex	: 'tx_metaseo_geo_region',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                });
                break;


            case 'searchengines':
                var fieldRendererSitemapPriority = function(value, metaData, record, rowIndex, colIndex, store) {
                    var qtip = value;

                    if( value == '0' ) {
                        value = '<span class="metaseo-default">'+Ext.util.Format.htmlEncode(MetaSeo.overview.conf.lang.value_default)+'</span>';
                    } else {
                        value = Ext.util.Format.htmlEncode(value);
                    }

                    return me._fieldRendererCallback(value, qtip, false, false);
                }

                columnModel.push({
                    id       : 'tx_metaseo_canonicalurl',
                    header   : MetaSeo.overview.conf.lang.page_searchengine_canonicalurl,
                    width    : 400,
                    sortable : false,
                    dataIndex: 'tx_metaseo_canonicalurl',
                    renderer : fieldRendererRaw,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                },{
                    id       : 'tx_metaseo_priority',
                    header   : MetaSeo.overview.conf.lang.page_sitemap_priority,
                    width    : 150,
                    sortable : false,
                    dataIndex: 'tx_metaseo_priority',
                    renderer : fieldRendererSitemapPriority,
                    metaSeoClickEdit	: {
                        xtype: 'numberfield'
                    }
                },{
                    id       : 'tx_metaseo_is_exclude',
                    header   : MetaSeo.overview.conf.lang.page_searchengine_is_exclude,
                    width    : 100,
                    sortable : false,
                    dataIndex: 'tx_metaseo_is_exclude',
                    renderer : fieldRendererBoolean,
                    metaSeoClickEdit	: {
                        xtype: 'combo',
                        forceSelection: true,
                        editable: false,
                        mode: 'local',
                        triggerAction: 'all',
                        store: new Ext.data.ArrayStore({
                            id: 0,
                            fields: [
                                'id',
                                'label'
                            ],
                            data: [
                                [0, MetaSeo.overview.conf.lang.searchengine_is_exclude_disabled],
                                [1, MetaSeo.overview.conf.lang.searchengine_is_exclude_enabled]
                            ]
                        }),
                        valueField: 'id',
                        displayField: 'label'
                    }
                });
                break;


            case 'url':
                var fieldRendererUrlScheme = function(value, metaData, record, rowIndex, colIndex, store) {
                    var ret = '';

                    value = parseInt(value);
                    switch(value) {
                        case 0:
                            ret = '<span class="metaseo-default">'+Ext.util.Format.htmlEncode( MetaSeo.overview.conf.lang.page_url_scheme_default )+'</span>';
                            break;

                        case 1:
                            ret = '<strong class="metaseo-url-http">'+Ext.util.Format.htmlEncode( MetaSeo.overview.conf.lang.page_url_scheme_http)+'</strong>';
                            break;

                        case 2:
                            ret = '<strong class="metaseo-url-https">'+Ext.util.Format.htmlEncode( MetaSeo.overview.conf.lang.page_url_scheme_https)+'</strong>';
                            break;
                    }

                    return ret;
                }

                var fieldRendererUrlSimulate = function(value, metaData, record, rowIndex, colIndex, store) {
                    var qtip = Ext.util.Format.htmlEncode(MetaSeo.overview.conf.lang.qtip_url_simulate);

                    return '<div class="metaseo-toolbar" ext:qtip="' + qtip +'">'+MetaSeo.overview.conf.sprite.info+'</div>';
                }


                columnModel.push({
                    id       : 'url_scheme',
                    header   : MetaSeo.overview.conf.lang.page_url_scheme,
                    width    : 100,
                    sortable : false,
                    dataIndex: 'url_scheme',
                    renderer : fieldRendererUrlScheme,
                    metaSeoClickEdit	: {
                        xtype: 'combo',
                        forceSelection: true,
                        editable: false,
                        mode: 'local',
                        triggerAction: 'all',
                        store: new Ext.data.ArrayStore({
                            id: 0,
                            fields: [
                                'id',
                                'label'
                            ],
                            data: [
                                [0, MetaSeo.overview.conf.lang.page_url_scheme_default],
                                [1, MetaSeo.overview.conf.lang.page_url_scheme_http],
                                [2, MetaSeo.overview.conf.lang.page_url_scheme_https]
                            ]
                        }),
                        valueField: 'id',
                        displayField: 'label'
                    }
                },{
                    id       : 'alias',
                    header   : MetaSeo.overview.conf.lang.page_url_alias,
                    width    : 200,
                    sortable : false,
                    dataIndex: 'alias',
                    renderer : fieldRendererRaw,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                });

                if( MetaSeo.overview.conf.realurlAvailable ) {
                    columnModel.push({
                        id       : 'tx_realurl_pathsegment',
                        header   : MetaSeo.overview.conf.lang.page_url_realurl_pathsegment,
                        width    : 200,
                        sortable : false,
                        dataIndex: 'tx_realurl_pathsegment',
                        renderer : fieldRendererRaw,
                        metaSeoClickEdit	: {
                            xtype: 'textfield'
                        }
                    },{
                        id       : 'tx_realurl_pathoverride',
                        header   : MetaSeo.overview.conf.lang.page_url_realurl_pathoverride,
                        width    : 150,
                        sortable : false,
                        dataIndex: 'tx_realurl_pathoverride',
                        renderer : fieldRendererBoolean,
                        metaSeoClickEdit	: {
                            xtype: 'combo',
                            forceSelection: true,
                            editable: false,
                            mode: 'local',
                            triggerAction: 'all',
                            store: new Ext.data.ArrayStore({
                                id: 0,
                                fields: [
                                    'id',
                                    'label'
                                ],
                                data: [
                                    [0, MetaSeo.overview.conf.lang.boolean_no],
                                    [1, MetaSeo.overview.conf.lang.boolean_yes]
                                ]
                            }),
                            valueField: 'id',
                            displayField: 'label'
                        }
                    },{
                        id       : 'tx_realurl_exclude',
                        header   : MetaSeo.overview.conf.lang.page_url_realurl_exclude,
                        width    : 150,
                        sortable : false,
                        dataIndex: 'tx_realurl_exclude',
                        renderer : fieldRendererBoolean,
                        metaSeoClickEdit	: {
                            xtype: 'combo',
                            forceSelection: true,
                            editable: false,
                            mode: 'local',
                            triggerAction: 'all',
                            store: new Ext.data.ArrayStore({
                                id: 0,
                                fields: [
                                    'id',
                                    'label'
                                ],
                                data: [
                                    [0, MetaSeo.overview.conf.lang.boolean_no],
                                    [1, MetaSeo.overview.conf.lang.boolean_yes]
                                ]
                            }),
                            valueField: 'id',
                            displayField: 'label'
                        }
                    },{
                        id       : 'url_simulated',
                        header   : '',
                        width    : 50,
                        sortable : false,
                        renderer : fieldRendererUrlSimulate,
                        metaSeoOnClick: function(record, fieldName, fieldId, col, data) {
                            me.grid.loadMask.show();

                            var callbackFinish = function(response) {
                                var response = Ext.decode(response.responseText);

                                me.grid.loadMask.hide();

                                if( response && response.error ) {
                                    TYPO3.Flashmessage.display(TYPO3.Severity.error, '', Ext.util.Format.htmlEncode(response.error) );
                                }

                                if( response && response.url ) {
                                    TYPO3.Flashmessage.display(TYPO3.Severity.information, '', Ext.util.Format.htmlEncode(response.url) );
                                }
                            };

                            Ext.Ajax.request({
                                url: MetaSeo.overview.conf.ajaxController + '&cmd=generateSimulatedUrl',
                                params: {
                                    pid				: Ext.encode(record.get('uid')),
                                    sessionToken	: Ext.encode( MetaSeo.overview.conf.sessionToken )
                                },
                                success: callbackFinish,
                                failure: callbackFinish
                            });

                        }
                    });
                }

                break;

            case 'advanced':
                var fieldRendererAdvEditor = function(value, metaData, record, rowIndex, colIndex, store) {
                    var qtip = Ext.util.Format.htmlEncode("TODO");

                    // TODO

                    return '<div class="metaseo-toolbar" ext:qtip="' + qtip +'">'+MetaSeo.overview.conf.sprite.info+'</div>TODO';
                }

                columnModel.push({
                    id       : 'metatag',
                    header   : 'FOO',
                    width    : 'auto',
                    sortable : false,
                    dataIndex: 'metatag',
                    renderer	: fieldRendererAdvEditor,
                    metaSeoOnClick: function(record, fieldName, fieldId, col, data) {

                        // Init editor window
                        var editWindow = new MetaSeo.metaeditor({
                            pid: record.get('uid'),
                            onClose: function(reload) {
                                // TODO: Move to listener/event
                                if(reload) {
                                    me.storeReload();
                                }
                            }
                        });
                        editWindow.show();
                    }
                });
                break;


            case 'pagetitle':
                var fieldRendererTitleSimulate = function(value, metaData, record, rowIndex, colIndex, store) {
                    var qtip = Ext.util.Format.htmlEncode(MetaSeo.overview.conf.lang.qtip_pagetitle_simulate);

                    return '<div class="metaseo-toolbar" ext:qtip="' + qtip +'">'+MetaSeo.overview.conf.sprite.info+'</div>';
                }

                columnModel.push({
                    id       : 'tx_metaseo_pagetitle_rel',
                    header   : MetaSeo.overview.conf.lang.page_tx_metaseo_pagetitle_rel,
                    width    : 'auto',
                    sortable : false,
                    dataIndex: 'tx_metaseo_pagetitle_rel',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                },{
                    id       : 'tx_metaseo_pagetitle_prefix',
                    header   : MetaSeo.overview.conf.lang.page_tx_metaseo_pagetitle_prefix,
                    width    : 'auto',
                    sortable : false,
                    dataIndex: 'tx_metaseo_pagetitle_prefix',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                },{
                    id       : 'tx_metaseo_pagetitle_suffix',
                    header   : MetaSeo.overview.conf.lang.page_tx_metaseo_pagetitle_suffix,
                    width    : 'auto',
                    sortable : false,
                    dataIndex: 'tx_metaseo_pagetitle_suffix',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                },{
                    id       : 'tx_metaseo_pagetitle',
                    header   : MetaSeo.overview.conf.lang.page_tx_metaseo_pagetitle,
                    width    : 'auto',
                    sortable : false,
                    dataIndex: 'tx_metaseo_pagetitle',
                    renderer	: fieldRenderer,
                    metaSeoClickEdit	: {
                        xtype: 'textfield'
                    }
                },{
                    id       : 'title_simulated',
                    header   : '',
                    width    : 50,
                    sortable : false,
                    renderer : fieldRendererTitleSimulate,
                    metaSeoOnClick: function(record, fieldName, fieldId, col, data) {
                        me.grid.loadMask.show();

                        var callbackFinish = function(response) {
                            var response = Ext.decode(response.responseText);

                            me.grid.loadMask.hide();

                            if( response && response.error ) {
                                TYPO3.Flashmessage.display(TYPO3.Severity.error, '', Ext.util.Format.htmlEncode(response.error) );
                            }

                            if( response && response.title ) {
                                TYPO3.Flashmessage.display(TYPO3.Severity.information, '', Ext.util.Format.htmlEncode(response.title) );
                            }
                        };

                        Ext.Ajax.request({
                            url: MetaSeo.overview.conf.ajaxController + '&cmd=generateSimulatedTitle',
                            params: {
                                pid				: Ext.encode(record.get('uid')),
                                sessionToken	: Ext.encode( MetaSeo.overview.conf.sessionToken )
                            },
                            success: callbackFinish,
                            failure: callbackFinish
                        });

                    }
                });
                break;

            case 'pagetitlesim':
                columnModel.push({
                    id       : 'title_simulated',
                    header   : MetaSeo.overview.conf.lang.page_title_simulated,
                    width    : 400,
                    sortable : false,
                    dataIndex: 'title_simulated',
                    renderer : fieldRendererRaw
                });
                break;

        }


        // Add tooltip
        Ext.each(columnModel, function(item, index) {
            if( !item.tooltip ) {
                item.tooltip = item.header;
            }
        });

        return columnModel;
    },


    _fieldRenderer: function(value) {
        return this._fieldRendererCallback(value, value, 23, true);
    },

    _fieldRendererRaw: function(value) {
        return this._fieldRendererCallback(value, value, false, true);
    },

    _fieldRendererCallback: function(value, qtip, maxLength, escape) {
        var classes = '';
        var icon = '';

        if( this._cellEditMode ) {
            classes += 'metaseo-cell-editable ';
            icon = MetaSeo.overview.conf.sprite.edit;
        }

        if(this._fullCellHighlight && !Ext.isEmpty(MetaSeo.overview.conf.criteriaFulltext)) {
            if( MetaSeo.highlightTextExists(value, MetaSeo.overview.conf.criteriaFulltext) ) {
                classes += 'metaseo-cell-highlight ';
            }
        }

        if( maxLength && value != '' && value.length >= maxLength ) {
            value = value.substring(0, (maxLength-3) )+'...';
        }

        if(escape) {
            value = Ext.util.Format.htmlEncode(value);
            value = value.replace(/ /g, "&nbsp;");
            value += '&nbsp;';
        }



        if(escape) {
            qtip = Ext.util.Format.htmlEncode(qtip);
        }
        qtip = qtip.replace(/\n/g, "<br />");

        return '<div class="'+classes+'" ext:qtip="' + qtip +'">' + value +icon+'</div>';
    }


};
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Markus Blaschke <typo3@markus-blaschke.de> (metaseo)
 *  (c) 2013 Markus Blaschke (TEQneers GmbH & Co. KG) <blaschke@teqneers.de> (tq_seo)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
Ext.ns('MetaSeo');

MetaSeo.metaeditor = Ext.extend(Ext.Window, {
    layout: 'fit',
    width:  '90%',
    height: '90%',
    modal:  true,

    t3PageTitle: '',
    pid: 0,

    initComponent : function() {
        var window = this;

        this.title = MetaSeo.overview.conf.lang.metaeditor_title;

        if( this.t3PageTitle ) {
            this.title += ' "'+this.t3PageTitle+'"';
        }

        if( this.pid ) {
            this.title += ' [PID:'+this.pid+']';
        }

        this.items = [{
            xtype:'tabpanel',
            activeItem:0,
            //autoScroll: true,
            enableTabScroll : true,
            //autoHeight:true,
            height:340,
            //collapseMode: "mini",
            items:[
                window.initTabOpenGraph()
            ]
        }];

        this.buttons = [{
            text: MetaSeo.overview.conf.lang.button_cancel,
            handler: function(cmp, e) {
                window.onClose(false);
                window.destroy();
            }
        },{
            text: MetaSeo.overview.conf.lang.button_save,
            handler: function(cmp, e) {
                window.saveMeta(function() {
                    window.onClose(true);
                    window.destroy();
                });
            }
        }];


        // call parent
        MetaSeo.metaeditor.superclass.initComponent.call(this);

        this.addListener("show", function() {
            var el = window.getEl();
            el.mask();

            window.loadMeta(function() {
                el.unmask();
            });
        });


    },

    onClose: function(reload) {
        // placeholder
    },

    loadMeta: function(callback) {
        var me = this;


        // Process data from database/ajax call
        var callbackSuccess = function(response) {
            var responseJson =  Ext.util.JSON.decode(response.responseText);

            for( var index in responseJson ) {
                var value = responseJson[index];

                // Inject data into form
                var formField = me.find("name", index);
                if( formField.length == 1 ) {
                    formField = formField[0];
                    formField.setValue(value);
                }
            }

            // auto enable fields
            me.onChangeOgType();

            callback();
        }

        var callbackFailure = function() {
            // TODO
        }

        Ext.Ajax.request({
            url: MetaSeo.overview.conf.ajaxController + '&cmd=loadAdvMetaTags',
            params: {
                pid             : Ext.encode(me.pid),
                sysLanguage     : Ext.encode( MetaSeo.overview.conf.sysLanguage ),
                mode            : Ext.encode( MetaSeo.overview.conf.listType ),
                sessionToken    : Ext.encode( MetaSeo.overview.conf.sessionToken )
            },
            success: callbackSuccess,
            failure: callbackFailure
        });
    },

    saveMeta: function(callbackSuccess) {
        var me = this;

        var metaTagList = {};

        var formOpenGraph = this.find("name", "form-opengraph");
        if( formOpenGraph.length = 1 ) {
            formOpenGraph = formOpenGraph[0];

            formOpenGraph.items.each(function(formField) {
                    if( formField.isVisible() ) {
                    var formFieldName  = formField.getName();
                    var formFieldValue = formField.getValue();

                    metaTagList[formFieldName] = formFieldValue;
                }
            });
        }

        var callbackFailure = function() {
            // TODO: failure function
        }

        Ext.Ajax.request({
            url: MetaSeo.overview.conf.ajaxController + '&cmd=updateAdvMetaTags',
            params: {
                pid             : Ext.encode(me.pid),
                metaTags        : Ext.encode(metaTagList),
                sysLanguage     : Ext.encode( MetaSeo.overview.conf.sysLanguage ),
                mode            : Ext.encode( MetaSeo.overview.conf.listType ),
                sessionToken    : Ext.encode( MetaSeo.overview.conf.sessionToken )
            },
            success: callbackSuccess,
            failure: callbackFailure
        });
    },

    onChangeOgType: function() {
        var formOpenGraph = this.find("name", "form-opengraph")[0];
        var typeField = formOpenGraph.find("name", "og:type")[0];

        // Get current type
        var ogType           = typeField.getValue();

        // Default types
        var ogTypeDefault    = "og:general";
        var ogTypeMain       = "og:general";
        var ogTypeMainAndSub = "og:general";

        // Lookup current selected type
        var ogTypeMatch = ogType.match(/^([^:]+):?([^:]+)?/);
        if( ogTypeMatch ) {
            ogTypeMain = 'og:'+ogTypeMatch[1];

            if( ogTypeMatch[2] ) {
                ogTypeMainAndSub  = 'og:'+ogTypeMatch[1]+'-'+ogTypeMatch[2];
            }
        }

        // dynamic dis- and enable form elements
        formOpenGraph.items.each(function(formField) {
            if( formField.metaSeoFieldCat ) {
                if( MetaSeo.inList(formField.metaSeoFieldCat, ogTypeDefault)
                    || MetaSeo.inList(formField.metaSeoFieldCat, ogTypeMain)
                    || MetaSeo.inList(formField.metaSeoFieldCat, ogTypeMainAndSub) ) {
                    formField.show();
                } else {
                    formField.hide();
                }
            }
        });

    },

    initTabOpenGraph: function() {
        var me = this;

        var panel = {
            xtype: "panel",
            name: "form-opengraph",
            title: MetaSeo.overview.conf.lang.metaeditor_tab_opengraph,
            layout: {
                type: 'form'
            },
            padding: 10,
            labelWidth: 150,
            autoScroll: true,
            overflowY: 'scroll',
            items: []
        };

        var fieldWidth = 375;

        // ########################
        // OG: General fields
        // ########################
        panel.items.push(
            {
                xtype: "textfield",
                fieldLabel: 'og:title',
                name: 'og:title',
                width: fieldWidth,
                metaSeoFieldCat: 'og:general'
            },{
                xtype: 'combo',
                fieldLabel: 'og:type',
                name: 'og:type',
                listeners: {
                    select: function(f,e){
                        // dynamic field handling
                        me.onChangeOgType();
                    }
                },
                forceSelection: true,
                editable: false,
                mode: 'local',
                triggerAction: 'all',
                value : "",
                store: new Ext.data.ArrayStore({
                    id: 0,
                    fields: [
                        'id',
                        'label'
                    ],
                    data: [
                        ["", "---"],
                        ["article", "article"],
                        ["book", "book"],
                        ["profile", "profile"],
                        ["website", "website"],

                        ["music.song", "music.song"],
                        ["music.album", "music.album"],
                        ["music.playlist", "music.playlist"],
                        ["music.radio_station", "music.radio_station"],

                        ["video.movie", "video.movie"],
                        ["video.episode", "video.episode"],
                        ["video.tv_show", "video.tv_show"],
                        ["video.other", "video.other"]
                    ]
                }),
                valueField: 'id',
                displayField: 'label',
                width: fieldWidth,
                metaSeoFieldCat: 'og:general'
            }, {
                xtype: "textfield",
                fieldLabel: 'og:image',
                name: 'og:image',
                width: fieldWidth,
                metaSeoFieldCat: 'og:general'
            }, {
                xtype: "textfield",
                fieldLabel: 'og:description',
                name: 'og:description',
                width: fieldWidth,
                metaSeoFieldCat: 'og:general'
            }
        );

        // ########################
        // OG: Music General
        // ########################

        // ########################
        // OG: Music Song
        // ########################
// TODO: add array support
//        panel.items.push(
//            {
//                xtype: "textfield",
//                fieldLabel: 'og:music:duration',
//                name: 'og:music:duration',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:music:song'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:music:album',
//                name: 'og:music:duration',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:music:song'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:music:album:disc',
//                name: 'og:music:album:disc',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:music:song'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:music:album:track',
//                name: 'og:music:album:track',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:music:song'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:music:musician',
//                name: 'og:music:musician',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:music:song'
//            }
//        );


        // ########################
        // OG: Music Album
        // ########################

        // TODO

        // ########################
        // OG: Music Playlist
        // ########################

        // TODO

        // ########################
        // OG: Music Radio
        // ########################

        // TODO



        // ########################
        // OG: Video Movie/TvShow/Other
        // ########################

        // TODO

        // ########################
        // OG: Video Episode
        // ########################

        // TODO

        // ########################
        // OG: article
        // ########################
// TODO: add array support
//        panel.items.push(
//            {
//                xtype: "textfield",
//                fieldLabel: 'og:article:author',
//                name: 'og:article:author',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:article'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:article:isbn',
//                name: 'og:article:isbn',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:article'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:article:published_time',
//                name: 'og:article:published_time',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:article'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:article:modified_time',
//                name: 'og:article:modified_time',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:article'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:article:expiration_time',
//                name: 'og:article:expiration_time',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:article'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:article:section',
//                name: 'og:article:section',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:article'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:article:tag',
//                name: 'og:article:tag',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:article'
//            }
//        );

        // ########################
        // OG: book
        // ########################
// TODO: add array support
//        panel.items.push(
//            {
//                xtype: "textfield",
//                fieldLabel: 'og:book:author',
//                name: 'og:book:author',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:book'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:book:isbn',
//                name: 'og:book:isbn',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:book'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:book:release_date',
//                name: 'og:book:release_date',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:book'
//            }, {
//                xtype: "textfield",
//                fieldLabel: 'og:book:tag',
//                name: 'og:book:tag',
//                width: fieldWidth,
//                metaSeoFieldCat: 'og:book'
//            }
//        );

        // ########################
        // OG: Profile
        // ########################
        panel.items.push(
            {
                xtype: "textfield",
                fieldLabel: 'og:profile:first_name',
                name: 'og:profile:first_name',
                width: fieldWidth,
                metaSeoFieldCat: 'og:profile'
            }, {
                xtype: "textfield",
                fieldLabel: 'og:profile:last_name',
                name: 'og:profile:last_name',
                width: fieldWidth,
                metaSeoFieldCat: 'og:profile'
            }, {
                xtype: "textfield",
                fieldLabel: 'og:profile:username',
                name: 'og:profile:username',
                width: fieldWidth,
                metaSeoFieldCat: 'og:profile'
            }, {
                xtype: 'combo',
                fieldLabel: 'og:profile:gender',
                name: 'og:profile:gender',
                listeners: {
                    select: function(f,e){
                        // dynamic field handling
                        me.onChangeOgType();
                    }
                },
                forceSelection: true,
                editable: false,
                mode: 'local',
                triggerAction: 'all',
                value : "",
                store: new Ext.data.ArrayStore({
                    id: 0,
                    fields: [
                        'id',
                        'label'
                    ],
                    data: [
                        ["", "---"],
                        ["male", "male"],
                        ["female", "female"]
                    ]
                }),
                valueField: 'id',
                displayField: 'label',
                width: fieldWidth,
                metaSeoFieldCat: 'og:profile'
            }
        );


        return panel;
    }

});


/*
 * This code has been copied from Project_CMS
 * Copyright (c) 2005 by Phillip Berndt (www.pberndt.com)
 *
 * Extended Textarea for IE and Firefox browsers
 * Features:
 *  - Possibility to place tabs in <textarea> elements using a simply <TAB> key
 *  - Auto-indenting of new lines
 *
 * License: GNU General Public License
 */

function checkBrowser() {
	browserName = navigator.appName;
	browserVer = parseInt(navigator.appVersion);

	ok = false;
	if (browserName == "Microsoft Internet Explorer" && browserVer >= 4) {
		ok = true;
	} else if (browserName == "Netscape" && browserVer >= 3) {
		ok = true;
	}

	return ok;
}

	// Automatically change all textarea elements
function changeTextareaElements() {
	if (!checkBrowser()) {
			// Stop unless we're using IE or Netscape (includes Mozilla family)
		return false;
	}

	document.textAreas = document.getElementsByTagName("textarea");

	for (i = 0; i < document.textAreas.length; i++) {
			// Only change if the class parameter contains "enable-tab"
		if (document.textAreas[i].className && document.textAreas[i].className.search(/(^| )enable-tab( |$)/) != -1) {
			document.textAreas[i].textAreaID = i;
			makeAdvancedTextArea(document.textAreas[i]);
		}
	}
}

	// Wait until the document is completely loaded.
	// Set a timeout instead of using the onLoad() event because it could be used by something else already.
window.setTimeout("changeTextareaElements();", 200);

	// Turn textarea elements into "better" ones. Actually this is just adding some lines of JavaScript...
function makeAdvancedTextArea(textArea) {
	if (textArea.tagName.toLowerCase() != "textarea") {
		return false;
	}

		// On attempt to leave the element:
		// Do not leave if this.dontLeave is true
	textArea.onblur = function(e) {
		if (!this.dontLeave) {
			return;
		}
		this.dontLeave = null;
		window.setTimeout("document.textAreas[" + this.textAreaID + "].restoreFocus()", 1);
		return false;
	}

		// Set the focus back to the element and move the cursor to the correct position.
	textArea.restoreFocus = function() {
		this.focus();

		if (this.caretPos) {
			this.caretPos.collapse(false);
			this.caretPos.select();
		}
	}

		// Determine the current cursor position
	textArea.getCursorPos = function() {
		if (this.selectionStart) {
			currPos = this.selectionStart;
		} else if (this.caretPos) {	// This is very tricky in IE :-(
			oldText = this.caretPos.text;
			finder = "--getcurrpos" + Math.round(Math.random() * 10000) + "--";
			this.caretPos.text += finder;
			currPos = this.value.indexOf(finder);

			this.caretPos.moveStart('character', -finder.length);
			this.caretPos.text = "";

			this.caretPos.scrollIntoView(true);
		} else {
			return;
		}

		return currPos;
	}

		// On tab, insert a tabulator. Otherwise, check if a slash (/) was pressed.
	textArea.onkeydown = function(e) {
		if (this.selectionStart == null &! this.createTextRange) {
			return;
		}
		if (!e) {
			e = window.event;
		}

			// Tabulator
		if (e.keyCode == 9) {
			this.dontLeave = true;
			this.textInsert(String.fromCharCode(9));
		}

			// Newline
		if (e.keyCode == 13) {
				// Get the cursor position
			currPos = this.getCursorPos();

				// Search the last line
			lastLine = "";
			for (i = currPos - 1; i >= 0; i--) {
				if(this.value.substring(i, i + 1) == '\n') {
					break;
				}
			}
			lastLine = this.value.substring(i + 1, currPos);

				// Search for whitespaces in the current line
			whiteSpace = "";
			for (i = 0; i < lastLine.length; i++) {
				if (lastLine.substring(i, i + 1) == '\t') {
					whiteSpace += "\t";
				} else if (lastLine.substring(i, i + 1) == ' ') {
					whiteSpace += " ";
				} else {
					break;
				}
			}

				// Another ugly IE hack
			if (navigator.appVersion.match(/MSIE/)) {
				whiteSpace = "\\n" + whiteSpace;
			}

				// Insert whitespaces
			window.setTimeout("document.textAreas["+this.textAreaID+"].textInsert(\""+whiteSpace+"\");", 1);
		}
	}

		// Save the current cursor position in IE
	textArea.onkeyup = textArea.onclick = textArea.onselect = function(e) {
		if (this.createTextRange) {
			this.caretPos = document.selection.createRange().duplicate();
		}
	}

		// Insert text at the current cursor position
	textArea.textInsert = function(insertText) {
		if (this.selectionStart != null) {
			var savedScrollTop = this.scrollTop;
			var begin = this.selectionStart;
			var end = this.selectionEnd;
			if (end > begin + 1) {
				this.value = this.value.substr(0, begin) + insertText + this.value.substr(end);
			} else {
				this.value = this.value.substr(0, begin) + insertText + this.value.substr(begin);
			}

			this.selectionStart = begin + insertText.length;
			this.selectionEnd = begin + insertText.length;
			this.scrollTop = savedScrollTop;
		} else if (this.caretPos) {
			this.caretPos.text = insertText;
			this.caretPos.scrollIntoView(true);
		} else {
			text.value += insertText;
		}

		this.focus();
	}
}
/*!
 * Bootstrap v3.3.2 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 *
 * modified by bmack to wrap it as jQuery module for the backend, will be dropped for twbs 4.0
 * please do not reference outside of the TYPO3 Core (not in your own extensions)
 * as this is preliminary as long as twbs does not support AMD modules
 * this file will be deleted once twbs 4 is included
 */
// IIFE for faster access to jQuery and save $use

;(function(factory) {
	if (typeof define === 'function' && define.amd) {
		// register bootstrap as requirejs module
		define("bootstrap", ["jquery"], function($) {
			factory($);
		});
	} else {
		factory(TYPO3.jQuery || jQuery);
	}
})(function(jQuery) {
	if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(a){"use strict";var b=a.fn.jquery.split(" ")[0].split(".");if(b[0]<2&&b[1]<9||1==b[0]&&9==b[1]&&b[2]<1)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")}(jQuery),+function(a){"use strict";function b(){var a=document.createElement("bootstrap"),b={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var c in b)if(void 0!==a.style[c])return{end:b[c]};return!1}a.fn.emulateTransitionEnd=function(b){var c=!1,d=this;a(this).one("bsTransitionEnd",function(){c=!0});var e=function(){c||a(d).trigger(a.support.transition.end)};return setTimeout(e,b),this},a(function(){a.support.transition=b(),a.support.transition&&(a.event.special.bsTransitionEnd={bindType:a.support.transition.end,delegateType:a.support.transition.end,handle:function(b){return a(b.target).is(this)?b.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var c=a(this),e=c.data("bs.alert");e||c.data("bs.alert",e=new d(this)),"string"==typeof b&&e[b].call(c)})}var c='[data-dismiss="alert"]',d=function(b){a(b).on("click",c,this.close)};d.VERSION="3.3.2",d.TRANSITION_DURATION=150,d.prototype.close=function(b){function c(){g.detach().trigger("closed.bs.alert").remove()}var e=a(this),f=e.attr("data-target");f||(f=e.attr("href"),f=f&&f.replace(/.*(?=#[^\s]*$)/,""));var g=a(f);b&&b.preventDefault(),g.length||(g=e.closest(".alert")),g.trigger(b=a.Event("close.bs.alert")),b.isDefaultPrevented()||(g.removeClass("in"),a.support.transition&&g.hasClass("fade")?g.one("bsTransitionEnd",c).emulateTransitionEnd(d.TRANSITION_DURATION):c())};var e=a.fn.alert;a.fn.alert=b,a.fn.alert.Constructor=d,a.fn.alert.noConflict=function(){return a.fn.alert=e,this},a(document).on("click.bs.alert.data-api",c,d.prototype.close)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.button"),f="object"==typeof b&&b;e||d.data("bs.button",e=new c(this,f)),"toggle"==b?e.toggle():b&&e.setState(b)})}var c=function(b,d){this.$element=a(b),this.options=a.extend({},c.DEFAULTS,d),this.isLoading=!1};c.VERSION="3.3.2",c.DEFAULTS={loadingText:"loading..."},c.prototype.setState=function(b){var c="disabled",d=this.$element,e=d.is("input")?"val":"html",f=d.data();b+="Text",null==f.resetText&&d.data("resetText",d[e]()),setTimeout(a.proxy(function(){d[e](null==f[b]?this.options[b]:f[b]),"loadingText"==b?(this.isLoading=!0,d.addClass(c).attr(c,c)):this.isLoading&&(this.isLoading=!1,d.removeClass(c).removeAttr(c))},this),0)},c.prototype.toggle=function(){var a=!0,b=this.$element.closest('[data-toggle="buttons"]');if(b.length){var c=this.$element.find("input");"radio"==c.prop("type")&&(c.prop("checked")&&this.$element.hasClass("active")?a=!1:b.find(".active").removeClass("active")),a&&c.prop("checked",!this.$element.hasClass("active")).trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active"));a&&this.$element.toggleClass("active")};var d=a.fn.button;a.fn.button=b,a.fn.button.Constructor=c,a.fn.button.noConflict=function(){return a.fn.button=d,this},a(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(c){var d=a(c.target);d.hasClass("btn")||(d=d.closest(".btn")),b.call(d,"toggle"),c.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(b){a(b.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(b.type))})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.carousel"),f=a.extend({},c.DEFAULTS,d.data(),"object"==typeof b&&b),g="string"==typeof b?b:f.slide;e||d.data("bs.carousel",e=new c(this,f)),"number"==typeof b?e.to(b):g?e[g]():f.interval&&e.pause().cycle()})}var c=function(b,c){this.$element=a(b),this.$indicators=this.$element.find(".carousel-indicators"),this.options=c,this.paused=this.sliding=this.interval=this.$active=this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",a.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",a.proxy(this.pause,this)).on("mouseleave.bs.carousel",a.proxy(this.cycle,this))};c.VERSION="3.3.2",c.TRANSITION_DURATION=600,c.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},c.prototype.keydown=function(a){if(!/input|textarea/i.test(a.target.tagName)){switch(a.which){case 37:this.prev();break;case 39:this.next();break;default:return}a.preventDefault()}},c.prototype.cycle=function(b){return b||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(a.proxy(this.next,this),this.options.interval)),this},c.prototype.getItemIndex=function(a){return this.$items=a.parent().children(".item"),this.$items.index(a||this.$active)},c.prototype.getItemForDirection=function(a,b){var c=this.getItemIndex(b),d="prev"==a&&0===c||"next"==a&&c==this.$items.length-1;if(d&&!this.options.wrap)return b;var e="prev"==a?-1:1,f=(c+e)%this.$items.length;return this.$items.eq(f)},c.prototype.to=function(a){var b=this,c=this.getItemIndex(this.$active=this.$element.find(".item.active"));return a>this.$items.length-1||0>a?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){b.to(a)}):c==a?this.pause().cycle():this.slide(a>c?"next":"prev",this.$items.eq(a))},c.prototype.pause=function(b){return b||(this.paused=!0),this.$element.find(".next, .prev").length&&a.support.transition&&(this.$element.trigger(a.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},c.prototype.next=function(){return this.sliding?void 0:this.slide("next")},c.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},c.prototype.slide=function(b,d){var e=this.$element.find(".item.active"),f=d||this.getItemForDirection(b,e),g=this.interval,h="next"==b?"left":"right",i=this;if(f.hasClass("active"))return this.sliding=!1;var j=f[0],k=a.Event("slide.bs.carousel",{relatedTarget:j,direction:h});if(this.$element.trigger(k),!k.isDefaultPrevented()){if(this.sliding=!0,g&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var l=a(this.$indicators.children()[this.getItemIndex(f)]);l&&l.addClass("active")}var m=a.Event("slid.bs.carousel",{relatedTarget:j,direction:h});return a.support.transition&&this.$element.hasClass("slide")?(f.addClass(b),f[0].offsetWidth,e.addClass(h),f.addClass(h),e.one("bsTransitionEnd",function(){f.removeClass([b,h].join(" ")).addClass("active"),e.removeClass(["active",h].join(" ")),i.sliding=!1,setTimeout(function(){i.$element.trigger(m)},0)}).emulateTransitionEnd(c.TRANSITION_DURATION)):(e.removeClass("active"),f.addClass("active"),this.sliding=!1,this.$element.trigger(m)),g&&this.cycle(),this}};var d=a.fn.carousel;a.fn.carousel=b,a.fn.carousel.Constructor=c,a.fn.carousel.noConflict=function(){return a.fn.carousel=d,this};var e=function(c){var d,e=a(this),f=a(e.attr("data-target")||(d=e.attr("href"))&&d.replace(/.*(?=#[^\s]+$)/,""));if(f.hasClass("carousel")){var g=a.extend({},f.data(),e.data()),h=e.attr("data-slide-to");h&&(g.interval=!1),b.call(f,g),h&&f.data("bs.carousel").to(h),c.preventDefault()}};a(document).on("click.bs.carousel.data-api","[data-slide]",e).on("click.bs.carousel.data-api","[data-slide-to]",e),a(window).on("load",function(){a('[data-ride="carousel"]').each(function(){var c=a(this);b.call(c,c.data())})})}(jQuery),+function(a){"use strict";function b(b){var c,d=b.attr("data-target")||(c=b.attr("href"))&&c.replace(/.*(?=#[^\s]+$)/,"");return a(d)}function c(b){return this.each(function(){var c=a(this),e=c.data("bs.collapse"),f=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b);!e&&f.toggle&&"show"==b&&(f.toggle=!1),e||c.data("bs.collapse",e=new d(this,f)),"string"==typeof b&&e[b]()})}var d=function(b,c){this.$element=a(b),this.options=a.extend({},d.DEFAULTS,c),this.$trigger=a(this.options.trigger).filter('[href="#'+b.id+'"], [data-target="#'+b.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};d.VERSION="3.3.2",d.TRANSITION_DURATION=350,d.DEFAULTS={toggle:!0,trigger:'[data-toggle="collapse"]'},d.prototype.dimension=function(){var a=this.$element.hasClass("width");return a?"width":"height"},d.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var b,e=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(e&&e.length&&(b=e.data("bs.collapse"),b&&b.transitioning))){var f=a.Event("show.bs.collapse");if(this.$element.trigger(f),!f.isDefaultPrevented()){e&&e.length&&(c.call(e,"hide"),b||e.data("bs.collapse",null));var g=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var h=function(){this.$element.removeClass("collapsing").addClass("collapse in")[g](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!a.support.transition)return h.call(this);var i=a.camelCase(["scroll",g].join("-"));this.$element.one("bsTransitionEnd",a.proxy(h,this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])}}}},d.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var b=a.Event("hide.bs.collapse");if(this.$element.trigger(b),!b.isDefaultPrevented()){var c=this.dimension();this.$element[c](this.$element[c]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var e=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return a.support.transition?void this.$element[c](0).one("bsTransitionEnd",a.proxy(e,this)).emulateTransitionEnd(d.TRANSITION_DURATION):e.call(this)}}},d.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},d.prototype.getParent=function(){return a(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(a.proxy(function(c,d){var e=a(d);this.addAriaAndCollapsedClass(b(e),e)},this)).end()},d.prototype.addAriaAndCollapsedClass=function(a,b){var c=a.hasClass("in");a.attr("aria-expanded",c),b.toggleClass("collapsed",!c).attr("aria-expanded",c)};var e=a.fn.collapse;a.fn.collapse=c,a.fn.collapse.Constructor=d,a.fn.collapse.noConflict=function(){return a.fn.collapse=e,this},a(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(d){var e=a(this);e.attr("data-target")||d.preventDefault();var f=b(e),g=f.data("bs.collapse"),h=g?"toggle":a.extend({},e.data(),{trigger:this});c.call(f,h)})}(jQuery),+function(a){"use strict";function b(b){b&&3===b.which||(a(e).remove(),a(f).each(function(){var d=a(this),e=c(d),f={relatedTarget:this};e.hasClass("open")&&(e.trigger(b=a.Event("hide.bs.dropdown",f)),b.isDefaultPrevented()||(d.attr("aria-expanded","false"),e.removeClass("open").trigger("hidden.bs.dropdown",f)))}))}function c(b){var c=b.attr("data-target");c||(c=b.attr("href"),c=c&&/#[A-Za-z]/.test(c)&&c.replace(/.*(?=#[^\s]*$)/,""));var d=c&&a(c);return d&&d.length?d:b.parent()}function d(b){return this.each(function(){var c=a(this),d=c.data("bs.dropdown");d||c.data("bs.dropdown",d=new g(this)),"string"==typeof b&&d[b].call(c)})}var e=".dropdown-backdrop",f='[data-toggle="dropdown"]',g=function(b){a(b).on("click.bs.dropdown",this.toggle)};g.VERSION="3.3.2",g.prototype.toggle=function(d){var e=a(this);if(!e.is(".disabled, :disabled")){var f=c(e),g=f.hasClass("open");if(b(),!g){"ontouchstart"in document.documentElement&&!f.closest(".navbar-nav").length&&a('<div class="dropdown-backdrop"/>').insertAfter(a(this)).on("click",b);var h={relatedTarget:this};if(f.trigger(d=a.Event("show.bs.dropdown",h)),d.isDefaultPrevented())return;e.trigger("focus").attr("aria-expanded","true"),f.toggleClass("open").trigger("shown.bs.dropdown",h)}return!1}},g.prototype.keydown=function(b){if(/(38|40|27|32)/.test(b.which)&&!/input|textarea/i.test(b.target.tagName)){var d=a(this);if(b.preventDefault(),b.stopPropagation(),!d.is(".disabled, :disabled")){var e=c(d),g=e.hasClass("open");if(!g&&27!=b.which||g&&27==b.which)return 27==b.which&&e.find(f).trigger("focus"),d.trigger("click");var h=" li:not(.divider):visible a",i=e.find('[role="menu"]'+h+', [role="listbox"]'+h);if(i.length){var j=i.index(b.target);38==b.which&&j>0&&j--,40==b.which&&j<i.length-1&&j++,~j||(j=0),i.eq(j).trigger("focus")}}}};var h=a.fn.dropdown;a.fn.dropdown=d,a.fn.dropdown.Constructor=g,a.fn.dropdown.noConflict=function(){return a.fn.dropdown=h,this},a(document).on("click.bs.dropdown.data-api",b).on("click.bs.dropdown.data-api",".dropdown form",function(a){a.stopPropagation()}).on("click.bs.dropdown.data-api",f,g.prototype.toggle).on("keydown.bs.dropdown.data-api",f,g.prototype.keydown).on("keydown.bs.dropdown.data-api",'[role="menu"]',g.prototype.keydown).on("keydown.bs.dropdown.data-api",'[role="listbox"]',g.prototype.keydown)}(jQuery),+function(a){"use strict";function b(b,d){return this.each(function(){var e=a(this),f=e.data("bs.modal"),g=a.extend({},c.DEFAULTS,e.data(),"object"==typeof b&&b);f||e.data("bs.modal",f=new c(this,g)),"string"==typeof b?f[b](d):g.show&&f.show(d)})}var c=function(b,c){this.options=c,this.$body=a(document.body),this.$element=a(b),this.$backdrop=this.isShown=null,this.scrollbarWidth=0,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,a.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};c.VERSION="3.3.2",c.TRANSITION_DURATION=300,c.BACKDROP_TRANSITION_DURATION=150,c.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},c.prototype.toggle=function(a){return this.isShown?this.hide():this.show(a)},c.prototype.show=function(b){var d=this,e=a.Event("show.bs.modal",{relatedTarget:b});this.$element.trigger(e),this.isShown||e.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',a.proxy(this.hide,this)),this.backdrop(function(){var e=a.support.transition&&d.$element.hasClass("fade");d.$element.parent().length||d.$element.appendTo(d.$body),d.$element.show().scrollTop(0),d.options.backdrop&&d.adjustBackdrop(),d.adjustDialog(),e&&d.$element[0].offsetWidth,d.$element.addClass("in").attr("aria-hidden",!1),d.enforceFocus();var f=a.Event("shown.bs.modal",{relatedTarget:b});e?d.$element.find(".modal-dialog").one("bsTransitionEnd",function(){d.$element.trigger("focus").trigger(f)}).emulateTransitionEnd(c.TRANSITION_DURATION):d.$element.trigger("focus").trigger(f)}))},c.prototype.hide=function(b){b&&b.preventDefault(),b=a.Event("hide.bs.modal"),this.$element.trigger(b),this.isShown&&!b.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),a(document).off("focusin.bs.modal"),this.$element.removeClass("in").attr("aria-hidden",!0).off("click.dismiss.bs.modal"),a.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",a.proxy(this.hideModal,this)).emulateTransitionEnd(c.TRANSITION_DURATION):this.hideModal())},c.prototype.enforceFocus=function(){a(document).off("focusin.bs.modal").on("focusin.bs.modal",a.proxy(function(a){this.$element[0]===a.target||this.$element.has(a.target).length||this.$element.trigger("focus")},this))},c.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",a.proxy(function(a){27==a.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},c.prototype.resize=function(){this.isShown?a(window).on("resize.bs.modal",a.proxy(this.handleUpdate,this)):a(window).off("resize.bs.modal")},c.prototype.hideModal=function(){var a=this;this.$element.hide(),this.backdrop(function(){a.$body.removeClass("modal-open"),a.resetAdjustments(),a.resetScrollbar(),a.$element.trigger("hidden.bs.modal")})},c.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},c.prototype.backdrop=function(b){var d=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var f=a.support.transition&&e;if(this.$backdrop=a('<div class="modal-backdrop '+e+'" />').prependTo(this.$element).on("click.dismiss.bs.modal",a.proxy(function(a){a.target===a.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus.call(this.$element[0]):this.hide.call(this))},this)),f&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!b)return;f?this.$backdrop.one("bsTransitionEnd",b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):b()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var g=function(){d.removeBackdrop(),b&&b()};a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):g()}else b&&b()},c.prototype.handleUpdate=function(){this.options.backdrop&&this.adjustBackdrop(),this.adjustDialog()},c.prototype.adjustBackdrop=function(){this.$backdrop.css("height",0).css("height",this.$element[0].scrollHeight)},c.prototype.adjustDialog=function(){var a=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&a?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!a?this.scrollbarWidth:""})},c.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},c.prototype.checkScrollbar=function(){this.bodyIsOverflowing=document.body.scrollHeight>document.documentElement.clientHeight,this.scrollbarWidth=this.measureScrollbar()},c.prototype.setScrollbar=function(){var a=parseInt(this.$body.css("padding-right")||0,10);this.bodyIsOverflowing&&this.$body.css("padding-right",a+this.scrollbarWidth)},c.prototype.resetScrollbar=function(){this.$body.css("padding-right","")},c.prototype.measureScrollbar=function(){var a=document.createElement("div");a.className="modal-scrollbar-measure",this.$body.append(a);var b=a.offsetWidth-a.clientWidth;return this.$body[0].removeChild(a),b};var d=a.fn.modal;a.fn.modal=b,a.fn.modal.Constructor=c,a.fn.modal.noConflict=function(){return a.fn.modal=d,this},a(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(c){var d=a(this),e=d.attr("href"),f=a(d.attr("data-target")||e&&e.replace(/.*(?=#[^\s]+$)/,"")),g=f.data("bs.modal")?"toggle":a.extend({remote:!/#/.test(e)&&e},f.data(),d.data());d.is("a")&&c.preventDefault(),f.one("show.bs.modal",function(a){a.isDefaultPrevented()||f.one("hidden.bs.modal",function(){d.is(":visible")&&d.trigger("focus")})}),b.call(f,g,this)})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tooltip"),f="object"==typeof b&&b;(e||"destroy"!=b)&&(e||d.data("bs.tooltip",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.type=this.options=this.enabled=this.timeout=this.hoverState=this.$element=null,this.init("tooltip",a,b)};c.VERSION="3.3.2",c.TRANSITION_DURATION=150,c.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},c.prototype.init=function(b,c,d){this.enabled=!0,this.type=b,this.$element=a(c),this.options=this.getOptions(d),this.$viewport=this.options.viewport&&a(this.options.viewport.selector||this.options.viewport);for(var e=this.options.trigger.split(" "),f=e.length;f--;){var g=e[f];if("click"==g)this.$element.on("click."+this.type,this.options.selector,a.proxy(this.toggle,this));else if("manual"!=g){var h="hover"==g?"mouseenter":"focusin",i="hover"==g?"mouseleave":"focusout";this.$element.on(h+"."+this.type,this.options.selector,a.proxy(this.enter,this)),this.$element.on(i+"."+this.type,this.options.selector,a.proxy(this.leave,this))}}this.options.selector?this._options=a.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.getOptions=function(b){return b=a.extend({},this.getDefaults(),this.$element.data(),b),b.delay&&"number"==typeof b.delay&&(b.delay={show:b.delay,hide:b.delay}),b},c.prototype.getDelegateOptions=function(){var b={},c=this.getDefaults();return this._options&&a.each(this._options,function(a,d){c[a]!=d&&(b[a]=d)}),b},c.prototype.enter=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c&&c.$tip&&c.$tip.is(":visible")?void(c.hoverState="in"):(c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),clearTimeout(c.timeout),c.hoverState="in",c.options.delay&&c.options.delay.show?void(c.timeout=setTimeout(function(){"in"==c.hoverState&&c.show()},c.options.delay.show)):c.show())},c.prototype.leave=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),clearTimeout(c.timeout),c.hoverState="out",c.options.delay&&c.options.delay.hide?void(c.timeout=setTimeout(function(){"out"==c.hoverState&&c.hide()},c.options.delay.hide)):c.hide()},c.prototype.show=function(){var b=a.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(b);var d=a.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(b.isDefaultPrevented()||!d)return;var e=this,f=this.tip(),g=this.getUID(this.type);this.setContent(),f.attr("id",g),this.$element.attr("aria-describedby",g),this.options.animation&&f.addClass("fade");var h="function"==typeof this.options.placement?this.options.placement.call(this,f[0],this.$element[0]):this.options.placement,i=/\s?auto?\s?/i,j=i.test(h);j&&(h=h.replace(i,"")||"top"),f.detach().css({top:0,left:0,display:"block"}).addClass(h).data("bs."+this.type,this),this.options.container?f.appendTo(this.options.container):f.insertAfter(this.$element);var k=this.getPosition(),l=f[0].offsetWidth,m=f[0].offsetHeight;if(j){var n=h,o=this.options.container?a(this.options.container):this.$element.parent(),p=this.getPosition(o);h="bottom"==h&&k.bottom+m>p.bottom?"top":"top"==h&&k.top-m<p.top?"bottom":"right"==h&&k.right+l>p.width?"left":"left"==h&&k.left-l<p.left?"right":h,f.removeClass(n).addClass(h)}var q=this.getCalculatedOffset(h,k,l,m);this.applyPlacement(q,h);var r=function(){var a=e.hoverState;e.$element.trigger("shown.bs."+e.type),e.hoverState=null,"out"==a&&e.leave(e)};a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",r).emulateTransitionEnd(c.TRANSITION_DURATION):r()}},c.prototype.applyPlacement=function(b,c){var d=this.tip(),e=d[0].offsetWidth,f=d[0].offsetHeight,g=parseInt(d.css("margin-top"),10),h=parseInt(d.css("margin-left"),10);isNaN(g)&&(g=0),isNaN(h)&&(h=0),b.top=b.top+g,b.left=b.left+h,a.offset.setOffset(d[0],a.extend({using:function(a){d.css({top:Math.round(a.top),left:Math.round(a.left)})}},b),0),d.addClass("in");var i=d[0].offsetWidth,j=d[0].offsetHeight;"top"==c&&j!=f&&(b.top=b.top+f-j);var k=this.getViewportAdjustedDelta(c,b,i,j);k.left?b.left+=k.left:b.top+=k.top;var l=/top|bottom/.test(c),m=l?2*k.left-e+i:2*k.top-f+j,n=l?"offsetWidth":"offsetHeight";d.offset(b),this.replaceArrow(m,d[0][n],l)},c.prototype.replaceArrow=function(a,b,c){this.arrow().css(c?"left":"top",50*(1-a/b)+"%").css(c?"top":"left","")},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle();a.find(".tooltip-inner")[this.options.html?"html":"text"](b),a.removeClass("fade in top bottom left right")},c.prototype.hide=function(b){function d(){"in"!=e.hoverState&&f.detach(),e.$element.removeAttr("aria-describedby").trigger("hidden.bs."+e.type),b&&b()}var e=this,f=this.tip(),g=a.Event("hide.bs."+this.type);return this.$element.trigger(g),g.isDefaultPrevented()?void 0:(f.removeClass("in"),a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",d).emulateTransitionEnd(c.TRANSITION_DURATION):d(),this.hoverState=null,this)},c.prototype.fixTitle=function(){var a=this.$element;(a.attr("title")||"string"!=typeof a.attr("data-original-title"))&&a.attr("data-original-title",a.attr("title")||"").attr("title","")},c.prototype.hasContent=function(){return this.getTitle()},c.prototype.getPosition=function(b){b=b||this.$element;var c=b[0],d="BODY"==c.tagName,e=c.getBoundingClientRect();null==e.width&&(e=a.extend({},e,{width:e.right-e.left,height:e.bottom-e.top}));var f=d?{top:0,left:0}:b.offset(),g={scroll:d?document.documentElement.scrollTop||document.body.scrollTop:b.scrollTop()},h=d?{width:a(window).width(),height:a(window).height()}:null;return a.extend({},e,g,h,f)},c.prototype.getCalculatedOffset=function(a,b,c,d){return"bottom"==a?{top:b.top+b.height,left:b.left+b.width/2-c/2}:"top"==a?{top:b.top-d,left:b.left+b.width/2-c/2}:"left"==a?{top:b.top+b.height/2-d/2,left:b.left-c}:{top:b.top+b.height/2-d/2,left:b.left+b.width}},c.prototype.getViewportAdjustedDelta=function(a,b,c,d){var e={top:0,left:0};if(!this.$viewport)return e;var f=this.options.viewport&&this.options.viewport.padding||0,g=this.getPosition(this.$viewport);if(/right|left/.test(a)){var h=b.top-f-g.scroll,i=b.top+f-g.scroll+d;h<g.top?e.top=g.top-h:i>g.top+g.height&&(e.top=g.top+g.height-i)}else{var j=b.left-f,k=b.left+f+c;j<g.left?e.left=g.left-j:k>g.width&&(e.left=g.left+g.width-k)}return e},c.prototype.getTitle=function(){var a,b=this.$element,c=this.options;return a=b.attr("data-original-title")||("function"==typeof c.title?c.title.call(b[0]):c.title)},c.prototype.getUID=function(a){do a+=~~(1e6*Math.random());while(document.getElementById(a));return a},c.prototype.tip=function(){return this.$tip=this.$tip||a(this.options.template)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},c.prototype.enable=function(){this.enabled=!0},c.prototype.disable=function(){this.enabled=!1},c.prototype.toggleEnabled=function(){this.enabled=!this.enabled},c.prototype.toggle=function(b){var c=this;b&&(c=a(b.currentTarget).data("bs."+this.type),c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c))),c.tip().hasClass("in")?c.leave(c):c.enter(c)},c.prototype.destroy=function(){var a=this;clearTimeout(this.timeout),this.hide(function(){a.$element.off("."+a.type).removeData("bs."+a.type)})};var d=a.fn.tooltip;a.fn.tooltip=b,a.fn.tooltip.Constructor=c,a.fn.tooltip.noConflict=function(){return a.fn.tooltip=d,this}}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.popover"),f="object"==typeof b&&b;(e||"destroy"!=b)&&(e||d.data("bs.popover",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.init("popover",a,b)};if(!a.fn.tooltip)throw new Error("Popover requires tooltip.js");c.VERSION="3.3.2",c.DEFAULTS=a.extend({},a.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),c.prototype=a.extend({},a.fn.tooltip.Constructor.prototype),c.prototype.constructor=c,c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle(),c=this.getContent();a.find(".popover-title")[this.options.html?"html":"text"](b),a.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof c?"html":"append":"text"](c),a.removeClass("fade top bottom left right in"),a.find(".popover-title").html()||a.find(".popover-title").hide()},c.prototype.hasContent=function(){return this.getTitle()||this.getContent()},c.prototype.getContent=function(){var a=this.$element,b=this.options;return a.attr("data-content")||("function"==typeof b.content?b.content.call(a[0]):b.content)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")},c.prototype.tip=function(){return this.$tip||(this.$tip=a(this.options.template)),this.$tip};var d=a.fn.popover;a.fn.popover=b,a.fn.popover.Constructor=c,a.fn.popover.noConflict=function(){return a.fn.popover=d,this}}(jQuery),+function(a){"use strict";function b(c,d){var e=a.proxy(this.process,this);this.$body=a("body"),this.$scrollElement=a(a(c).is("body")?window:c),this.options=a.extend({},b.DEFAULTS,d),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",e),this.refresh(),this.process()}function c(c){return this.each(function(){var d=a(this),e=d.data("bs.scrollspy"),f="object"==typeof c&&c;e||d.data("bs.scrollspy",e=new b(this,f)),"string"==typeof c&&e[c]()})}b.VERSION="3.3.2",b.DEFAULTS={offset:10},b.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},b.prototype.refresh=function(){var b="offset",c=0;a.isWindow(this.$scrollElement[0])||(b="position",c=this.$scrollElement.scrollTop()),this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight();var d=this;this.$body.find(this.selector).map(function(){var d=a(this),e=d.data("target")||d.attr("href"),f=/^#./.test(e)&&a(e);return f&&f.length&&f.is(":visible")&&[[f[b]().top+c,e]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){d.offsets.push(this[0]),d.targets.push(this[1])})},b.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(!e[a+1]||b<=e[a+1])&&this.activate(f[a])},b.prototype.activate=function(b){this.activeTarget=b,this.clear();var c=this.selector+'[data-target="'+b+'"],'+this.selector+'[href="'+b+'"]',d=a(c).parents("li").addClass("active");d.parent(".dropdown-menu").length&&(d=d.closest("li.dropdown").addClass("active")),d.trigger("activate.bs.scrollspy")},b.prototype.clear=function(){a(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var d=a.fn.scrollspy;a.fn.scrollspy=c,a.fn.scrollspy.Constructor=b,a.fn.scrollspy.noConflict=function(){return a.fn.scrollspy=d,this},a(window).on("load.bs.scrollspy.data-api",function(){a('[data-spy="scroll"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tab");e||d.data("bs.tab",e=new c(this)),"string"==typeof b&&e[b]()})}var c=function(b){this.element=a(b)};c.VERSION="3.3.2",c.TRANSITION_DURATION=150,c.prototype.show=function(){var b=this.element,c=b.closest("ul:not(.dropdown-menu)"),d=b.data("target");if(d||(d=b.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),!b.parent("li").hasClass("active")){var e=c.find(".active:last a"),f=a.Event("hide.bs.tab",{relatedTarget:b[0]}),g=a.Event("show.bs.tab",{relatedTarget:e[0]});if(e.trigger(f),b.trigger(g),!g.isDefaultPrevented()&&!f.isDefaultPrevented()){var h=a(d);this.activate(b.closest("li"),c),this.activate(h,h.parent(),function(){e.trigger({type:"hidden.bs.tab",relatedTarget:b[0]}),b.trigger({type:"shown.bs.tab",relatedTarget:e[0]})})}}},c.prototype.activate=function(b,d,e){function f(){g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),h?(b[0].offsetWidth,b.addClass("in")):b.removeClass("fade"),b.parent(".dropdown-menu")&&b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),e&&e()
	}var g=d.find("> .active"),h=e&&a.support.transition&&(g.length&&g.hasClass("fade")||!!d.find("> .fade").length);g.length&&h?g.one("bsTransitionEnd",f).emulateTransitionEnd(c.TRANSITION_DURATION):f(),g.removeClass("in")};var d=a.fn.tab;a.fn.tab=b,a.fn.tab.Constructor=c,a.fn.tab.noConflict=function(){return a.fn.tab=d,this};var e=function(c){c.preventDefault(),b.call(a(this),"show")};a(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',e).on("click.bs.tab.data-api",'[data-toggle="pill"]',e)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.affix"),f="object"==typeof b&&b;e||d.data("bs.affix",e=new c(this,f)),"string"==typeof b&&e[b]()})}var c=function(b,d){this.options=a.extend({},c.DEFAULTS,d),this.$target=a(this.options.target).on("scroll.bs.affix.data-api",a.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",a.proxy(this.checkPositionWithEventLoop,this)),this.$element=a(b),this.affixed=this.unpin=this.pinnedOffset=null,this.checkPosition()};c.VERSION="3.3.2",c.RESET="affix affix-top affix-bottom",c.DEFAULTS={offset:0,target:window},c.prototype.getState=function(a,b,c,d){var e=this.$target.scrollTop(),f=this.$element.offset(),g=this.$target.height();if(null!=c&&"top"==this.affixed)return c>e?"top":!1;if("bottom"==this.affixed)return null!=c?e+this.unpin<=f.top?!1:"bottom":a-d>=e+g?!1:"bottom";var h=null==this.affixed,i=h?e:f.top,j=h?g:b;return null!=c&&c>=e?"top":null!=d&&i+j>=a-d?"bottom":!1},c.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(c.RESET).addClass("affix");var a=this.$target.scrollTop(),b=this.$element.offset();return this.pinnedOffset=b.top-a},c.prototype.checkPositionWithEventLoop=function(){setTimeout(a.proxy(this.checkPosition,this),1)},c.prototype.checkPosition=function(){if(this.$element.is(":visible")){var b=this.$element.height(),d=this.options.offset,e=d.top,f=d.bottom,g=a("body").height();"object"!=typeof d&&(f=e=d),"function"==typeof e&&(e=d.top(this.$element)),"function"==typeof f&&(f=d.bottom(this.$element));var h=this.getState(g,b,e,f);if(this.affixed!=h){null!=this.unpin&&this.$element.css("top","");var i="affix"+(h?"-"+h:""),j=a.Event(i+".bs.affix");if(this.$element.trigger(j),j.isDefaultPrevented())return;this.affixed=h,this.unpin="bottom"==h?this.getPinnedOffset():null,this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix","affixed")+".bs.affix")}"bottom"==h&&this.$element.offset({top:g-b-f})}};var d=a.fn.affix;a.fn.affix=b,a.fn.affix.Constructor=c,a.fn.affix.noConflict=function(){return a.fn.affix=d,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var c=a(this),d=c.data();d.offset=d.offset||{},null!=d.offsetBottom&&(d.offset.bottom=d.offsetBottom),null!=d.offsetTop&&(d.offset.top=d.offsetTop),b.call(c,d)})})}(jQuery);
});