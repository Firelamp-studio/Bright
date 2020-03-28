/**
 * @import js-utilities
 * @culo
 * @type {ImageBitmapRenderingContext | WebGLRenderingContext | WebGL2RenderingContext | CanvasRenderingContext2D | RenderingContext | OffscreenRenderingContext | OffscreenCanvasRenderingContext2D | *}
 */

$(document).ready(function () {
    //animazione del popup

    //costruzione del sito
    setTimeout(function () {

        let $canvas = $('#Go');
        let canvas = $canvas.get(0);
        let ctx = $canvas.get(0).getContext('2d');

        canvas.width = $canvas.parent().width();
        canvas.height = $canvas.parent().height();


        ctx.fillRect(0,0,canvas.width,canvas.height);

//canvas
    }, 100);

    //rimozione del popup di caricamento
    setTimeout(function () {

    }, 200);
});
