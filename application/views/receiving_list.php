<div id="navigation">
    <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a href="/admin">Administration</a></li>
        <li><a class="active" href="/receiving">Receiving</a></li>
        <li><a href="/production">Production</a></li>
        <li><a href="/sales">Sales</a></li>
    </ul>
</div>

<div id="content">
    <div id="title">
        <h1>Receiving</h1>
    </div>

    <div id="body">
        <div id="listTable" class ="row">
		{form_open}
			{Materials_table}
		{form_close}
		</div>

    </div>
</div>



<!--
<div class="row">
    {items}
    <div class="span4">{name}</div>
    {/items}
</div>


<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>NAME</th> 
    <th>AMOUNT</th>
  </tr>
{items}
  <tr>
    <td>{id}</td>
    <td>{name}</td> 
    <td>{amount}</td>

  </tr>
{/items}

</table> 
=======
<div id="navigation">
    <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a href="/admin">Administration</a></li>
        <li><a class="active" href="/material">Material</a></li>
        <li><a href="/recipe">Recipe</a></li>
        <li><a href="/product">Product</a></li>
    </ul>
</div>
<div id="content">
    <div id="title">
        <h1>Material</h1>
    </div>

    <div id="body">
        <div class="row">
            {items}
            <div class="span4">{name}</div>
            {/items}
        </div>
    </div>
</div>
