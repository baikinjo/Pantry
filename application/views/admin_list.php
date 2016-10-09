<div id="navigation">
    <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a class="active" href="/admin">Administration</a></li>
        <li><a href="/receiving">Receiving</a></li>
        <li><a href="/production">Production</a></li>
        <li><a href="/sales">Sales</a></li>
    </ul>
</div>
<div id="content">
    <div id="title">
        <h1>Administration</h1>
    </div>

    <div id="body">
        <div id="subtitles">
            <ul class="nav">
                <li id="subtitle" class="activeSubtitle" onclick="changeTable(this)">Receiving</li>
                <li id="subtitle" onclick="changeTable(this)">Production</li>
                <li id="subtitle" onclick="changeTable(this)">Sales</li>
            </ul>
        </div>
        <div class="adTables">
            <div id="m" class="activeTable">
                {form_open}
                    {Materials_table}
                {form_close}
            </div>
            <div id="r" class="notActiveTable">
                {form_open}
                    {Recipes_table}
                {form_close}
            </div>
            <div id="p" class="notActiveTable">
                {form_open}
                    {Products_table}
                {form_close}
            </div>
        </div>
    </div>
</div>

