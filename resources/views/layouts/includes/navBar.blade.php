
<a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
<a href="/home" class="btn btn-outline rounded-pill"><i class="fa fa-home"></i>Home</a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"></i> Employee</a>
<a href="{{ route('products.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i> Products</a>
<a href="{{ route('orders.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"></i> Order</a>
<a href="{{ route('transaction.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"></i> Transactions</a>
<a href="{{ route('suppliers.index') }}" class="btn btn-outline rounded-pill"><i class="far fa-building"></i> Suppliers</a>
<a href="{{ route('customers.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-users"></i> Customers</a>
<a href="{{ route('shippers.index') }}" class="btn btn-outline rounded-pill"><i class="fas fa-truck"></i> Shippers</a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill"><i class="fas fa-money-check-alt"></i> Inventory</a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-file"></i> Reports</a>

<style>
    .btn-outline{
        border-color: #008b8b;
        color: #008b8b;
    }
    .btn-outline:hover{
        background: #008b8b;
        color: #fff;
    }
</style>