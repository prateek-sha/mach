$("span").on("click", function() {
    $(this).parent().parent().parent().fadeOut(500, function() {
        $(this).remove();
    })
    console.log("clicked")
})