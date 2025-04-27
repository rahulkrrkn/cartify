function redirectUrl(match) {
  const referrer = document.referrer?.trim() || "/cartify/";
  if (Array.isArray(match)) {
    window.location.href = match.some((e) => referrer.includes(e))
      ? "/cartify/"
      : referrer;
    return;
  }
  if (typeof match === "string" && match.trim().length > 0) {
    window.location.href = match;
    return;
  }
  window.location.href = referrer;
}
function isMobile() {
  if (window.innerWidth < 768) {
    return true;
  }
  return false;
}
function isDesktop() {
  if (window.innerWidth >= 768) {
    return true;
  }
  return false;
}
