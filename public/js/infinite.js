
$(document).ready(function () {
    var page1 = 1;
    var page2 = 1;
    var isLoading = false;

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
            if (!isLoading) {
                isLoading = true;

                if (page1 <= {{ $comments->lastPage() }}) {
                    $.get('{{ route('/blog/{post:slug}`) }}?page1=${page1}`, function (data) {
                        $('#data-container').append(data);
                        page1++;
                        isLoading = false;
                    });
                } else if (page2 <= {{ $replies->lastPage() }}) {
                    $.get('{{ route('/blog/{post:slug}`) }}?page2=${page2}`, function (data) {
                        $('#data-container').append(data);
                        page2++;
                        isLoading = false;
                    });
                }
            }
        }
    });
});
