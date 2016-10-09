<div id="navigation">
    <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a href="/admin">Administration</a></li>
        <li><a href="/receiving">Receiving</a></li>
        <li><a class="active" href="/production">Production</a></li>
        <li><a href="/sales">Sales</a></li>
    </ul>
</div>
<div id="content">
    <div id="title">
        <h1>Production</h1>
    </div>

    <div id="body">
        <div id="lisaTable" class="row">
            {items}
            <div class="span4"><a href = "/Recipe/get/{id}">{name}</a></div>
            {/items}
        </div>
    </div>
</div>
