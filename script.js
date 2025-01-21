const eventsslider = document.querySelector('.eventsslider');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

let translateX = 0;

nextBtn.addEventListener('click', () => {
  const cardWidth = document.querySelector('.eventscard').offsetWidth + 20; // Card width + gap
  const containerWidth = document.querySelector('.eventsslider-container').offsetWidth;

  if (translateX > -(eventsslider.scrollWidth - containerWidth)) {
    translateX -= cardWidth;
    eventsslider.style.transform = `translateX(${translateX}px)`;
  }
});

prevBtn.addEventListener('click', () => {
  const cardWidth = document.querySelector('.eventscard').offsetWidth + 20;

  if (translateX < 0) {
    translateX += cardWidth;
    eventsslider.style.transform = `translateX(${translateX}px)`;
  }
});
