<div id="navigation">
    <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a href="/admin">Administration</a></li>
        <li><a href="/material">Material</a></li>
        <li><a href="/recipe">Recipe</a></li>
        <li><a class="active" href="/product">Product</a></li>
    </ul>
</div>
<div id="content">
    <div id="title">
        <h1>Product</h1>
    </div>

    <div id="body">
        <div class="row">
            {items}
            <div class="span4">{name}</div>
            {/items}
        </div>
    </div>
</div>