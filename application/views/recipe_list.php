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
            {items}
            <div class="span4"><a href = "/Recipe/get/{id}">{name}</a></div>
            {/items}
        </div>
    </div>
</div>
