<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="{{ 'https://www.gravatar.com/avatar/'.md5(auth()->user()->email) }}" class="img-circle" alt="{{ auth()->user()->name }}">
    </div>
    <div class="pull-left info">
        <p>{{ auth()->user()->name }}</p>
        <a href="javascript:"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>