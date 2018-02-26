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
        $.get('admin/user/' + id + '/delete', function (data) {
            if (data) {
                alert('User deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting user');
            }
        });
    }
    return false;
}

function deleteCode(id) {
    if (confirm('Are you sure you want to delete this code?')) {
        $.get('/admin/code/' + id + '/delete', function (data) {
            if (data) {
                alert('Code deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting code');
            }
        });
    }
    return false;
}

function deleteCategory(id) {
    if (confirm('Are you sure you want to delete this category?')) {
        $.get('/admin/genre/' + id + '/delete', function (data) {
            if (data) {
                alert('Category deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting category');
            }
        });
    }
    return false;
}

function deleteActor(id) {
    if (confirm('Are you sure you want to delete this actor?')) {
        $.get('/admin/actor/' + id + '/delete', function (data) {
            if (data) {
                alert('Actor deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting actor');
            }
        });
    }
    return false;
}

function deleteVideo(id) {
    if (confirm('Are you sure you want to delete this video?')) {
        $.get('/admin/video/' + id + '/delete', function (data) {
            if (data) {
                alert('Video was deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting video');
            }
        });
    }
    return false;
}

function deleteEpisode(id) {
    if (confirm('Are you sure you want to delete this episode?')) {
        $.get('/admin/episode/' + id + '/delete', function (data) {
            if (data) {
                alert('Episode was deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting episode');
            }
        });
    }
    return false;
}