    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <?php
        $userRole = Auth::user()->role;
        ?>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/home">Home </a></li>
                @if($userRole == 'admin')
                    <li><a href="/users">Users</a></li>
                    <li><a href="/district">District</a></li>
                    <li><a href="/region">Region</a></li>
                <li><a href="/zone">Zone</a></li>
                @endif;
                <li><a href="/profile">Profile</a></li>
                <li><a href="/unit">Units</a></li>
                <li><a href="/program">Program</a></li>
                <li><a href="/product">Product</a></li>
                <li><a href="/logout">logout</a></li>
			</ul>
        </div><!--/.nav-collapse -->
    </div>
