<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{ url() }}/campaigns">
                        <i class="glyphicon glyphicon-th"></i> All Campaigns
                    </a>
                </li>
                @foreach($campaigns as $campaign)
                <li>
                    <a href="{{ url() }}/view-campaign/{{ $campaign['id'] }}">{{ $campaign['campaign_name'] }}</a>
                </li>
                @endforeach
            </ul>
        </div>