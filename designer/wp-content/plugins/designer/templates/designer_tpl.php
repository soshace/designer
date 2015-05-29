<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div id="canvas-container">
                <!-- DesignerJS core goes here -->
            </div>
        </div>
        <div class="col-lg-5 col-lg-offset-1">
            <div class="designer_main-menu">
                <a class="btn btn-default js-designer-tab" href="products-tab">Products</a>
                <a class="btn btn-default js-designer-tab" href="colors-tab">Color</a>
                <a class="btn btn-default js-designer-tab" href="text-tab">Text</a>
                <a class="btn btn-default js-designer-tab" href="graphics-tab">Graphics</a>
                <a class="btn btn-default js-designer-tab" href="numbers-tab">Numbers</a>
            </div>
        </div>
        <div id="products-tab" class="col-lg-5 col-lg-offset-1 hide">
            <div id="products-search" class="search-box">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search"
                           data-bind="value: productsSearchQuery, valueUpdate: 'input'">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                    <button class="close" aria-hidden="true"
                            data-bind="visible: productsSearchQuery().length > 0, click: clearProductsSearch">&times;</button>
                </div>
            </div>
            <div class="divider"></div>
            <a class="designer-back-btn btn1"
               data-bind="click: backProductsItem, visible: productSelectedCategories().length > 1"
               style="display:none;"></a>
            <ul data-bind="foreach: productCategories">
                <li>
                    <span data-bind="text: name"></span>
                </li>
            </ul>
            <ul data-bind="foreach: currentProducts, css: { narrow: productSelectedCategories().length > 1 }"
                class="thumbnails designer-categories-subcategories">
                <li class="thumbnail"
                    data-bind="click: $root.selectProductItem, css: { category: isCategory(), product: isProduct(), active: $data.id() == $root.selectedProductVO().id() }, style: { backgroundImage: 'url(' + categoryThumb() + ')' }">
                    <a data-bind="css: { active: $data.id() == $root.selectedProductVO().id(), visible: isProduct() }">
                        <div class="state"></div>
                        <span data-bind="text: name"></span>
                        <img src="" data-bind="attr: { src: thumbUrl, title: name }" alt="">
                    </a>
                    <a data-bind="text: name, visible: isCategory()" class="acategory"></a>
                </li>
            </ul>
        </div>
        <div id="colors-tab" class="col-lg-5 col-lg-offset-1 hide">
            <ul data-bind="foreach: { data: selectedProductColorVO().colorizeGroupList}">
                <li>
                    <span data-bind="text: name"></span>
                    <ul id="product-colorizable-elements-list" class="list-unstyled"
                        data-bind="foreach: { data: classes, afterAdd: $root.selectedProductColorVO().createColorPicker }">
                        <li>
                            <a class="designer-color-picker-btn">
                                <span data-bind="text: name"></span>
                                <input type="text" class="designer-color-picker dropup-color-picker"
                                       data-bind="colorPickerInit: { container: true, isDropup: true }, colorPicker: value, productColorPalette: colors"/>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>