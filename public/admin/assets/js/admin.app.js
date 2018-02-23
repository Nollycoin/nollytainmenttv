function deletePage(id) {
    if (confirm('Are you sure you want to delete this page?')) {
        $.get('/page/' + id + '/delete', function (data) {
            if (data) {
                alert('Page deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting page');
            }
        });
    }

    return false;
}

function deleteUser(id) {
    if (confirm('Are you sure you want to delete this user?')) {
        $.get('/user/' + id + '/delete', function (data) {
            if (data) {
                alert('User deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting page');
            }
        });
    }
    return false;
}