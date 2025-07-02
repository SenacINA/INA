import { Editor } from 'https://esm.sh/@tiptap/core'
import StarterKit from 'https://esm.sh/@tiptap/starter-kit'
import Underline   from 'https://esm.sh/@tiptap/extension-underline'
import TextAlign   from 'https://esm.sh/@tiptap/extension-text-align'

document.addEventListener('DOMContentLoaded', () => {
  const contentDiv     = document.querySelector('.editor-content')
  const descricaoInput = document.getElementById('descricao')

  const initialHTML = contentDiv.innerHTML.trim()
  contentDiv.innerHTML = ''

  const editor = new Editor({
    element: contentDiv,
    content: initialHTML || '<p></p>',
    editorProps: {
      attributes: { class: 'tiptap_editor' }
    },
    extensions: [
      StarterKit.configure({
        bulletList:  { HTMLAttributes: { class: 'bullet-list'   } },
        orderedList: { HTMLAttributes: { class: 'ordered-list'  } },
      }),
      Underline,
      TextAlign.configure({ types: ['heading','paragraph','listItem'] }),
    ],

    onCreate: () => {
      descricaoInput.value = editor.getHTML()
    },

    onUpdate: () => {
      document.querySelectorAll('.toolbar button').forEach(button => {
        const cmd = button.dataset.command
        if (!cmd) return
        const active = cmd.startsWith('align')
          ? editor.isActive({ textAlign: cmd.replace('align','').toLowerCase() })
          : editor.isActive(cmd)
        button.classList.toggle('active', active)
      })
      descricaoInput.value = editor.getHTML()
    },
  })

  const commands = {
    bold:         () => editor.chain().focus().toggleBold().run(),
    underline:    () => editor.chain().focus().toggleUnderline().run(),
    italic:       () => editor.chain().focus().toggleItalic().run(),
    strike:       () => editor.chain().focus().toggleStrike().run(),
    bulletList:   () => editor.chain().focus().toggleBulletList().run(),
    orderedList:  () => editor.chain().focus().toggleOrderedList().run(),
    alignLeft:    () => editor.chain().focus().setTextAlign('left').run(),
    alignCenter:  () => editor.chain().focus().setTextAlign('center').run(),
    alignRight:   () => editor.chain().focus().setTextAlign('right').run(),
    alignJustify: () => editor.chain().focus().setTextAlign('justify').run(),
  }

  document.querySelectorAll('.toolbar button[data-command]').forEach(button => {
    button.addEventListener('click', () => {
      commands[button.dataset.command]()
    })
  })

  editor.chain().focus().run()
})
