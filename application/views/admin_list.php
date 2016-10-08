<div id="navigation">
    <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a class="active" href="/admin">Administration</a></li>
        <li><a href="/material">Material</a></li>
        <li><a href="/recipe">Recipe</a></li>
        <li><a href="/product">Product</a></li>
    </ul>
</div>
<div id="content">
    <div id="title">
        <h1>Administration</h1>
    </div>

    <div id="body">
        <div id="subtitles">
            <ul class="nav">
                <li id="subtitle" class="activeSubtitle" onclick="changeTable(this)">Material</li>
                <li id="subtitle" onclick="changeTable(this)">Recipe</li>
                <li id="subtitle" onclick="changeTable(this)">Product</li>
            </ul>
        </div>
        <div class="adTables">
            <div id="m" class="activeTable">{Materials_table}</div>
            <div id="r" class="notActiveTable">{Recipes_table}</div>
            <div id="p" class="notActiveTable">{Products_table}</div>
        </div>
    </div>
</div>

