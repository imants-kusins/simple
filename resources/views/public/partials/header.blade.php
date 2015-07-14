<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <!-- <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li> -->
                @foreach($campaigns as $campaign)
                <li>
                    <a href="{{ url() }}/view-campaign/{{ $campaign['id'] }}">{{ $campaign['campaign_name'] }}</a>
                </li>
                @endforeach
            </ul>
        </div>