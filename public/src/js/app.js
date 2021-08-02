/*var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function(event)
{
    event.preventDefault();

    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    //console.log('Test!');
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
})

$('#modal-save').on('click', function()
{
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: { body: $('#post-body').val(), postId: postId, _token: token}
    })
    .done(function (msg) {
        $(postBodyElement).text(msg['new_body']);

    })
});

$('.like').on('click', function(event)
{
    var isLike = event.target.previousElementSibling == null ? true : false;
    console.log(isLike);
});*/
