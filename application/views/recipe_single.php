<div id="navigation">
    <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a href="/admin">Administration</a></li>
        <li><a href="/material">Material</a></li>
        <li><a class="active" href="/recipe">Recipe</a></li>
        <li><a href="/product">Product</a></li>
    </ul>
</div>
<div id="content">
    <div id="title">
        <h1>Recipe</h1>
    </div>

    <div id="body">
        <div class="row">
            <div class="span4">{itemName}
                <hr>
                {materialList}
                <p>{name} : {amount} ({inStock})</p>
                {/materialList}
                <hr>
                {form_open}
                {amountToCraftForm}
                {craftButton}
                {form_close}
            </div>
        </div>
    </div>
</div>