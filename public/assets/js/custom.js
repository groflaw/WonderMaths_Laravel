'use strict';

var basePath;

function capitalizeWords(str) {
    return str.replace(/\w\S*/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}

function initBasePath() {
    basePath = $('#basePath').val();
}

$(document).ready(function() {
    initBasePath();
});
