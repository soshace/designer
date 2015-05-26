<div class="container-fluid">
    <div data-bind="visible: !$root.status().completed">
        <h5 data-bind="text: $root.status().message" class="text-center text-info"></h5>

        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar"
                 data-bind="style: { width: $root.percentCompleted() }"></div>
        </div>
    </div>

    <div class="row" data-bind="visible: $root.status().completed" style="display: none">
        <div class="col-lg-6">
            <div id="canvas-container">
                <!-- DesignerJS core goes here -->
            </div>
        </div>
        <ul class="col-lg-6">
            <li>
                <a href="">Products</a>
            </li>
            <li>
                <a href="">Color</a>
            </li>
            <li>
                <a href="">Text</a>
            </li>
            <li>
                <a href="">Graphics</a>
            </li>
            <li>
                <a href="">Numbers</a>
            </li>
        </ul>
    </div>
</div>