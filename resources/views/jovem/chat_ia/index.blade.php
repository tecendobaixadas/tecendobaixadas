<x-app-layout>
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Chat com IA</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl flex-fill d-flex flex-column">
            <div class="card flex-fill">
                <div class="row g-0 flex-fill">
                    <div class="col-12 col-lg-5 col-xl-12 border-end d-flex flex-column">
                        <div class="card-body scrollable flex-fill" id="chat-body">
                            <div class="chat">
                                <div class="chat-bubbles" id="chat-messages">
                                    
                                    {{-- Mensagem inicial fixa do bot --}}
                                    <div class="chat-item">
                                        <div class="row align-items-end">
                                            <div class="col-auto">
                                                <div class="chat-bubble">
                                                    <div class="chat-bubble-body">
                                                        <p>Olá, sou sua assistente virtual, como posso te ajudar hoje?</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Exibição das mensagens anteriores --}}
                                    @foreach ($messages as $msg)
                                        <div class="chat-item">
                                            <div class="row align-items-end {{ $msg->sender === 'user' ? 'justify-content-end' : '' }}">
                                                <div class="col-auto {{ $msg->sender === 'user' ? 'order-2' : '' }}">
                                                    <div class="chat-bubble {{ $msg->sender === 'user' ? 'chat-bubble-me' : '' }}">
                                                        <div class="chat-bubble-body">
                                                            <p>{{ $msg->message }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <form id="chat-form">
                                <div class="input-group input-group-flat">
                                    <input type="text" class="form-control" id="message-input" autocomplete="off" placeholder="Digite aqui sua mensagem...">
                                    <span class="input-group-text">
                                        <button type="submit" class="btn btn-icon btn-link link-secondary p-0" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M10 14l11 -11" />
                                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatMessages = document.getElementById('chat-messages');
            const messageInput = document.getElementById('message-input');
            const chatForm = document.getElementById('chat-form');
            const chatBody = document.getElementById('chat-body');
            const sendButton = chatForm.querySelector('button[type="submit"]');

            sendButton.disabled = true;

            messageInput.addEventListener('input', function() {
                sendButton.disabled = messageInput.value.trim() === '';
            });

            function scrollToBottom() {
                chatBody.scrollTop = chatBody.scrollHeight;
            }

            function addMessage(sender, message, isTyping = false) {
                const chatItem = document.createElement('div');
                chatItem.classList.add('chat-item');
                chatItem.innerHTML = `
                    <div class="row align-items-end ${sender === 'user' ? 'justify-content-end' : ''}">
                        <div class="col-auto ${sender === 'user' ? 'order-2' : ''}">
                            <div class="chat-bubble ${sender === 'user' ? 'chat-bubble-me' : ''}">
                                <div class="chat-bubble-body">
                                    ${isTyping ? '<p class="text-secondary text-italic">Digitando<span class="animated-dots"></span></p>' : `<p>${message}</p>`}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                chatMessages.appendChild(chatItem);
                scrollToBottom();
            }

            // Verifica se já existem mensagens anteriores no Blade
            const existingMessages = {{ count($messages) }};

            // Se não houver mensagens antigas, mostra a digitação simulada
            if (existingMessages === 0) {
                const firstBotMessage = chatMessages.firstElementChild.querySelector('p');
                firstBotMessage.innerHTML = '<span class="text-secondary text-italic">Digitando<span class="animated-dots"></span></span>';
                setTimeout(() => {
                    firstBotMessage.innerHTML = 'Olá, sou sua assistente virtual, como posso te ajudar hoje?';
                    scrollToBottom();
                }, 1500);
            }

            chatForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const text = messageInput.value.trim();
                if (!text) return;

                addMessage('user', text);
                messageInput.value = '';
                sendButton.disabled = true;

                addMessage('bot', '', true);

                const response = await fetch('{{ route('jovem.chat.ia.send') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ message: text })
                });

                const data = await response.json();

                const typing = chatMessages.querySelector('.text-italic');
                if (typing) typing.closest('.chat-item').remove();

                addMessage('bot', data.bot.message);
            });

            scrollToBottom();
        });
    </script>

</x-app-layout>