$(function(){
    $('[data-translit="from"]').keyup(function (){
        var idFrom = $(this).attr('id');
        var idTo = $('[data-translit=to]').attr('id');
        $(this).closest('form').liTranslit({
            elName: '#'+idFrom,
            elAlias: '#'+idTo
        });
    });
});

jQuery.fn.liTranslit = function(options){
  // настройки по умолчанию
  var o = jQuery.extend({
    elName: '.s_name',    //Класс елемента с именем
    elAlias: '.s_alias'    //Класс елемента с алиасом
  },options);
  return this.each(function(){
    var elName = $(this).find(o.elName),
      elAlias = $(this).find(o.elAlias),
      nameVal;
    function tr(el){
      nameVal = el.val();
      inser_trans(get_trans(nameVal));
    };
    elName.keyup(function () {
      tr($(this));
    });
    tr(elName);
    function get_trans() {//alert()
      en_to_ru = {
        'а': 'a',
        'б': 'b',
        'в': 'v',
        'г': 'g',
        'д': 'd',
        'е': 'e',
        'ё': 'yo',
        'ж': 'j',
        'з': 'z',
        'и': 'i',
        'й': 'y',
        'к': 'k',
        'л': 'l',
        'м': 'm',
        'н': 'n',
        'о': 'o',
        'п': 'p',
        'р': 'r',
        'с': 's',
        'т': 't',
        'у': 'u',
        'ф': 'f',
        'х': 'h',
        'ц': 'ts',
        'ч': 'ch',
        'ш': 'sh',
        'щ': 'sch',
        'ъ': '',
        'ы': 'y',
        'ь': '',
        'э': 'e',
        'ю': 'yu',
        'я': 'ya',

        ' ': '-',

        '0': '0',
        '1': '1',
        '2': '2',
        '3': '3',
        '4': '4',
        '5': '5',
        '6': '6',
        '7': '7',
        '8': '8',
        '9': '9',

        'a': 'a',
        'b': 'b',
        'c': 'c',
        'd': 'd',
        'e': 'e',
        'f': 'f',
        'g': 'g',
        'h': 'h',
        'i': 'i',
        'j': 'j',
        'k': 'k',
        'l': 'l',
        'm': 'm',
        'n': 'n',
        'o': 'o',
        'p': 'p',
        'q': 'q',
        'r': 'r',
        's': 's',
        't': 't',
        'u': 'u',
        'v': 'v',
        'w': 'w',
        'x': 'x',
        'y': 'y',
        'z': 'z',

      };
      nameVal = nameVal.toLowerCase();
      nameVal = trim(nameVal);
      nameVal = nameVal.split("");
      var trans = new String();
      for (i = 0; i < nameVal.length; i++) {
        for (key in en_to_ru) {
          val = en_to_ru[key];
          if (key == nameVal[i]) {
            trans += val;
            break;
          }
        };
      };
      return trans;
    };
    function inser_trans(result) {
        result = result.substr(0,128);
      elAlias.val(result);
    };
    function trim(string) {
      string = string.replace(/'|"|<|>|\!|\||@|#|$|%|^|\^|\$|\\|\/|&|\*|\(\)|-|\|\/|;|\+|№|,|\?|_|:|{|}|\[|\]/g, "");
      string = string.replace(/(^\s+)|(\s+$)/g, "");
      return string;
    };
  });
};
