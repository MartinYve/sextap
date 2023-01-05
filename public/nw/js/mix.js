$(document).ready(function(){
    let btn = $('#plus');
    let section = $('#elm');
    let minus = $('#minus');
    minus.hide();

    var i;
    $(btn).click(function(e){
        i++;
        e.preventDefault();
        var result = section.children('.copie')[0].outerHTML;
        section.append(result);
        minus.show();
    })



    $(minus).click(function(e){
        // i--;
        e.preventDefault();
        $result = $('#elm').children();
        $result.last().remove();
        if($result.length < 3){
            minus.hide();
            console.log($result.length);
        }
        // console.log($result.length);
        
    })
})
