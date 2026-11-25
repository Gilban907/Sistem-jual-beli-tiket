document.addEventListener('DOMContentLoaded', () => {
    const tickets = {}; // { eventId_title: qty }
    const orderBox = document.querySelector('.order-box');
    const orderList = orderBox.querySelector('.order-list');
    const totalTicketElem = orderBox.querySelector('.total-ticket');
    const totalPriceElem = orderBox.querySelector('.total-price');
    const chooseTicketBtn = orderBox.querySelector('.btn-choose-ticket');
    const orderEmptyMsg = orderBox.querySelector('.order-empty-msg');

    function parsePrice(priceStr) {
        const match = priceStr.match(/(\d+[.,]?\d*)/);
        if (!match) return 0;
        let number = match[1].replace(',', '');
        if (priceStr.toLowerCase().includes('idr')) {
            if (priceStr.toUpperCase().includes('K')) {
                number = parseFloat(number) * 1000;
            } else {
                number = parseFloat(number);
            }
        } else {
            number = parseFloat(number);
        }
        return number;
    }

    function updateOrderBox() {
        orderList.innerHTML = '';
        let totalTickets = 0;
        let totalPrice = 0;

        for (const [key, qty] of Object.entries(tickets)) {
            if (qty <= 0) continue;

            const ticketCard = document.querySelector(`.ticket-card[data-ticket-key="${key}"]`);
            const title = ticketCard.getAttribute('data-event-title');
            const priceStr = ticketCard.getAttribute('data-event-price');
          const date = ticketCard.getAttribute('data-event-date'); // misal "2024-11-12"
const formattedDate = new Date(date).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
            const start_time = ticketCard.getAttribute('data-event-start_time');
            const end_time = ticketCard.getAttribute('data-event-end_time');
            let priceNum = parsePrice(priceStr);

            // Jika tiket VIP, kalikan harga dengan 3
           if (title.toLowerCase() === 'vip') {
        priceNum *= 3;
    }
            totalTickets += qty;
            totalPrice += priceNum * qty;

            const orderItem = document.createElement('div');
            orderItem.classList.add('order-item', 'd-flex', 'align-items-center', 'justify-content-between', 'mb-2');

            orderItem.innerHTML = `
            <div>
                <strong class="mb-1"> ${title}</strong>
                <p class="text-badge" style='font-size:.9rem'>${formattedDate}, ${start_time}-${end_time} WIB</p>
              
            </div>
            <div>
                  <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-outline-secondary btn-order-minus">-</button>
                    <span class="ticket-qty">${qty}</span>
                    <button class="btn btn-sm btn-outline-secondary btn-order-plus ">+</button>
                </div>
            </div>
        `;

            const btnPlus = orderItem.querySelector('.btn-order-plus');
            const btnMinus = orderItem.querySelector('.btn-order-minus');

            btnPlus.addEventListener('click', () => {
                tickets[key]++;
                const qtyElem = document.querySelector(`.ticket-card[data-ticket-key="${key}"] .qty`);
                if (qtyElem) qtyElem.textContent = tickets[key];
                updateOrderBox();
            });

            btnMinus.addEventListener('click', () => {
                if (tickets[key] > 0) {
                    tickets[key]--;
                    const qtyElem = document.querySelector(`.ticket-card[data-ticket-key="${key}"] .qty`);
                    if (qtyElem) qtyElem.textContent = tickets[key];
                    updateOrderBox();
                }
            });

            orderList.appendChild(orderItem);
        }

        totalTicketElem.textContent = totalTickets;
        totalPriceElem.textContent = totalTickets === 0 ? '--' : `$ ${totalPrice.toLocaleString('id-ID')}`;
        chooseTicketBtn.disabled = totalTickets === 0;
        orderEmptyMsg.style.display = totalTickets === 0 ? 'block' : 'none';
    }



    document.querySelectorAll('.ticket-card').forEach(card => {
        const eventId = card.getAttribute('data-event-id');
        const title = card.getAttribute('data-event-title');
        const qtyElem = card.querySelector('.qty');
        const btnPlus = card.querySelector('.btn-plus');
        const btnMinus = card.querySelector('.btn-minus');

        const key = `${eventId}_${title}`;
        tickets[key] = 0;
        card.setAttribute('data-ticket-key', key); // Tag agar bisa dicari kembali saat update

        btnPlus.addEventListener('click', () => {
            tickets[key]++;
            qtyElem.textContent = tickets[key];
            updateOrderBox();
        });

        btnMinus.addEventListener('click', () => {
            if (tickets[key] > 0) {
                tickets[key]--;
                qtyElem.textContent = tickets[key];
                updateOrderBox();
            }
        });
    });

    chooseTicketBtn.addEventListener('click', () => {
    const totalTickets = Object.values(tickets).reduce((a, b) => a + b, 0);
    if (totalTickets === 0) return;

    let subtotal = 0;
    let ticketDetails = [];

    for (const [key, qty] of Object.entries(tickets)) {
        if (qty <= 0) continue;

        const ticketCard = document.querySelector(`.ticket-card[data-ticket-key="${key}"]`);
        const title = ticketCard.getAttribute('data-event-title');
        const priceStr = ticketCard.getAttribute('data-event-price');
        let priceNum = parsePrice(priceStr);

        if (title.toLowerCase() === 'vip') {
            priceNum *= 3;
        }

        subtotal += priceNum * qty;

        ticketDetails.push(`${title}:${qty}`);
    }

    const tax = 1;
    const total = subtotal + tax;
    const ticketParam = encodeURIComponent(ticketDetails.join(','));
const idPage=document.querySelector('#idPage').value;
    const url = `/checkout/${idPage}?subtotal=${subtotal}&tickets=${totalTickets}&tax=${tax}&total=${total}&detail=${ticketParam}`;
    window.location.href = url;
});


    updateOrderBox();
});
 function updateTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;
    }

    // Update langsung saat halaman dibuka
    updateTime();

    // Update setiap detik
    setInterval(updateTime, 1000);