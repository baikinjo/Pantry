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
        <h1>{itemName}</h1>
    </div>

    <div id="body">
        <div id="listTable" class="row">
            <div class="span4">
                {recipeMaterialTable}
                <hr>
                {form_open}
                {amountToCraftForm}
                {craftButton}
                {previous}
                {form_close}
            </div>
        </div>
    </div>
</div>