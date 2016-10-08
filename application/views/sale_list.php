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
       <div class="">
       {form_open}
       {Products_table}
       <hr>       
       {order_button}
       {clear_data}
       {form_close}
       </div>
    </div>
</div>