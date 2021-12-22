<script type="text/javascript">
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('div.dropdown-menu');


    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
        cluster: 'ap3',
        encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('Notify');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('send-message', function (data) {
        var existingNotifications = notifications.html();
        var newNotificationHtml = export_text(data);
        notifications.html(newNotificationHtml + existingNotifications);
        $('#dropdown_menu>a').not(":last");
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
    });
    function export_text(item) {
        let href = '';
        let title = '';
        let description = '';
        if (item.type_notify == 0){
            href = '/admin/booking/'+ item.id_item;
            title = 'New Booking';
            description = 'A tour is booked';
        }
        if (item.type_notify == 1){
            href = '/admin/user/'+item.id_item;
            title = 'New User';
            description = 'A new user has registered';
        }
        return '<a href="'+ href + '"><div class="pl-2 pt-2"><div class="media-body"><strong class="notification-title">'+title+'</strong><div class="notification-meta">'+description+'</div></div></div></a><hr>';
    }
</script>
