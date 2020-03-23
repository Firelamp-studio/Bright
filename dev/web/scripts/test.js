$('[text-lang="en"]').hide();

$('#switch-lang').click(function() {
    $('[text-lang="it"]').toggle();
    $('[text-lang="en"]').toggle();
});