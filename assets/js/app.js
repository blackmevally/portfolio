document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.filter');
  const cards = document.querySelectorAll('.project-card');

  if (!buttons.length || !cards.length) return;

  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      const filter = button.dataset.filter || 'all';
      buttons.forEach((item) => item.classList.toggle('active', item === button));

      cards.forEach((card) => {
        const category = card.dataset.category || '';
        const show = filter === 'all' || category === filter;
        card.hidden = !show;
      });
    });
  });
});
