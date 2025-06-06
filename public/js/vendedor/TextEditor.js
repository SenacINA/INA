import { Editor } from 'https://esm.sh/@tiptap/core'
import StarterKit from 'https://esm.sh/@tiptap/starter-kit'
import Underline from 'https://esm.sh/@tiptap/extension-underline'
import TextAlign from 'https://esm.sh/@tiptap/extension-text-align'

document.addEventListener('DOMContentLoaded', () => {
    const editor = new Editor({
        editorProps: {
            attributes: {
              class: 'tiptap_editor',
            },
          },
        element: document.querySelector('.editor-content'),
        extensions: [
            StarterKit.configure({
                bulletList: {
                    HTMLAttributes: {
                        class: 'bullet-list',
                    },
                },
                orderedList: {
                    HTMLAttributes: {
                        class: 'ordered-list',
                    },
                },
            }),
            Underline, 
            TextAlign.configure({
                types: ['heading', 'paragraph', 'listItem'],
            }),
        ],
        onUpdate: () => {
            document.querySelectorAll('.toolbar button').forEach(button => {
                const command = button.dataset.command
                if (!command) return
                
                const isActive = command.startsWith('align') 
                    ? editor.isActive({ textAlign: command.replace('align', '').toLowerCase() })
                    : editor.isActive(command)
                
                button.classList.toggle('active', isActive)
                const descricao_input = document.querySelector("#descricao");
                descricao_input.value = editor.getText();
            })
        },
    })

    
    const commands = {
        bold: () => editor.chain().focus().toggleBold().run(),
        underline: () => editor.chain().focus().toggleUnderline().run(),
        italic: () => editor.chain().focus().toggleItalic().run(),
        strike: () => editor.chain().focus().toggleStrike().run(),
        bulletList: () => editor.chain().focus().toggleBulletList().run(),
        orderedList: () => editor.chain().focus().toggleOrderedList().run(),
        alignLeft: () => editor.chain().focus().setTextAlign('left').run(),
        alignCenter: () => editor.chain().focus().setTextAlign('center').run(),
        alignRight: () => editor.chain().focus().setTextAlign('right').run(),
        alignJustify: () => editor.chain().focus().setTextAlign('justify').run(),
    }

    document.querySelectorAll('.toolbar button[data-command]').forEach(button => {
        button.addEventListener('click', () => {
            commands[button.dataset.command]()
            editor.chain().focus().run()
        })
    })

    editor.chain().focus().run()
})