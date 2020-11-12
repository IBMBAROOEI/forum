$('.like').on('click', function (event) {
    event.preventDefault();
    var threadid = event.target.parentNode.dataset['threadid'];
    var islike = event.target.previousElementSibling == null ? true : false;

    $.ajax({
        method: 'POST',
        url: "{{ url('/like') }}",
        data: {islike: islike, threadid: threadid, _token: _token}
    })
        .done(function () {
            event.target.innerText = islike ? event.target.innerText == 'Like' ? '' : 'like' : event.target.innerText == 'Dislike' ? '' : 'Dislike';
            if (islike) {
                event.target.nextElementSibling.innerText = 'Dislike'
            } else {
                event.target.previousElementSibling.innerText = 'Like'

            }
        });
});
var _token = '{{ Session::token() }}';
