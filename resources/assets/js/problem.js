(function ($, window, document) {
    $(document).ready(function () {
        if ($('#editor').length) {
            $('#editor').text(
                '#include <iostream>' + '\n' + '\n' +
                'using namespace std;' + '\n' + '\n' +
                'int main() {' + '\n' + '\n' +
                '\t' +'return 0;' + '\n' +
                '}'
            );
            var editor = ace.edit('editor');
            editor.setOptions({
                enableBasicAutocompletion: true,
                enableLiveAutocompletion: true,
                showInvisibles: true,
                tabSize: 4,
                wrap: true,
                useSoftTabs: true,
                theme: "ace/theme/dawn"
            });

            editor.commands.addCommand({
                name: "save",
                bindKey: {win: "Ctrl-s", mac: "Command-s"},
                exec: function () {
                },
            });


            if ($('[data-solution]').length) {
                editor.getSession().setMode("ace/mode/" + $('[data-ace-mode]').data('ace-mode'));
                editor.setReadOnly(true);
            }

            $('[data-programming-languages]').change(function () {
                editor.getSession().setMode("ace/mode/" + $('[data-ace-mode]:selected').data('ace-mode'));
            });
            $('[data-programming-languages]').trigger('change');
        }

        $('[data-submit-solution]').submit(function (e) {
            var code = editor.getValue();
            if (code.length) {
                $('input[name=solution_code]').val(code)
            }
        })
    });
})(jQuery, window, document);