function toggleLesson(...elementIds) {
    elementIds.forEach(id => {
      const element = document.getElementById(id);
      if (element.style.display === 'none' || element.classList.contains('hidden')) {
        element.style.display = 'block';
        element.classList.remove('hidden');
      } else {
        element.style.display = 'none';
        element.classList.add('hidden');
      }
    });
  }

  function toggleDay(day) {
    toggleLesson(`tid_${day}`, `Sal_${day}`, `Utbildare_${day}`);
}