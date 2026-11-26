document.addEventListener("DOMContentLoaded", function () {
  const baseUrl = "https://luxuryprojectsinnoida.com";
  const getUrls = window.location.pathname.replace(/\/$/, "");
  const elements = {
    footerBgImg: document.getElementById("background-imageId"),
    whatsaapId: document.getElementById("socialId"),
    headerNumber: document.getElementById("callId"),
    footerAddress: document.getElementById("addressId"),
    footerPhoneNumber: document.getElementById("footerNo"),
    popupFormImg: document.getElementById("popupImgId"),
    popupLogoImg: document.getElementById("popupLogoId"),
    videoLinkImg: document.getElementById("videoIframe"),
    headerLogoImg: document.getElementById("dynamicLogo"),
    headerLogoLink: document.getElementById("dynamicLogoLink"),
    footerSocial: document.getElementById("footerSocialNumber"), 
  };

  function applyProjectData(data) {
    const {
      logo, footerBg, whatsapp, popupImg, popupLogo, video,
      tel, telText, address, headerAlt, headerTitle
    } = data;
    if (elements.headerLogoImg) {
      elements.headerLogoImg.src = logo;
      elements.headerLogoImg.alt = headerAlt;
      elements.headerLogoImg.title = headerTitle;
    }
    if (elements.footerBgImg) {
      elements.footerBgImg.style = `background-image: url(${footerBg});`;
    }
    if (elements.whatsaapId) elements.whatsaapId.href = whatsapp;
    if (elements.popupFormImg) elements.popupFormImg.src = popupImg;
    if (elements.popupLogoImg) elements.popupLogoImg.src = popupLogo;
    if (elements.videoLinkImg) elements.videoLinkImg.src = video;
    if (elements.headerNumber) {
      elements.headerNumber.href = `tel:${tel}`;
      elements.headerNumber.innerText = telText;
    }
    if (elements.footerPhoneNumber) {
      elements.footerPhoneNumber.href = `tel:${tel}`;
      elements.footerPhoneNumber.innerText = telText;
      elements.footerSocial.href = `tel:${tel}`;
    }
    if (elements.footerAddress) elements.footerAddress.innerText = address;
    if (elements.headerLogoLink) elements.headerLogoLink.href = baseUrl + getUrls;
  }
  switch (getUrls) {
      case "/kalpataru-vista-sector-128-noida":
        applyProjectData({
          logo: "../new-assest/images/kalpataru-vista/kalpataru-vista-logo.png",
          footerBg: "../new-assest/images/kalpataru-vista/kalpataru-vista-footer-bg.webp",
          whatsapp: "https://api.whatsapp.com/send/?phone=+919899055030&text=Hi!%20Im%20Interested%20in%20Kalpataru%20Vista%20in%20Sector%20128,%20Noida.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences.",
          popupImg: "../new-assest/images/kalpataru-vista/kalpataru-vista-popup.webp",
          popupLogo: "../new-assest/images/kalpataru-vista/kalpataru-vista-logo-black.png",
          video: "https://www.youtube.com/embed/JDylLqmp3U0",
          tel: "+918012500400",
          telText: "+91 8012 500 400",
          address: "Sector 128, Wish Town, Noida",
          headerAlt: "Kalpataru Vista Logo",
          headerTitle: "Kalpataru Vista Logo"
        });
      break;

      case "/ambience-tiverton-sector-50-noida":
        applyProjectData({
          logo: "../new-assest/images/ambience-tiverton/ambience-tiverton-logo.png",
          footerBg: "../new-assest/images/ambience-tiverton/ambience-tiverton-footer-bg.webp",
          whatsapp: "https://api.whatsapp.com/send/?phone=+919899055030&text=Hi!%20Im%20Interested%20in%20Ambience%20Tiverton%20in%20Sector%2050,%20Noida.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences.",
          popupImg: "../new-assest/images/ambience-tiverton/ambience-tiverton-popup.webp",
          popupLogo: "../new-assest/images/ambience-tiverton/ambience-tiverton-logo-black.png",
          video: "https://www.youtube.com/embed/FLkgTWnlMdA",
          tel: "+918012500400",
          telText: "+91 8012 500 400",
          address: "Sector 50, Noida, Uttar Pradesh",
          headerAlt: "Ambience Tiverton Logo",
          headerTitle: "Ambience Tiverton Logo"
        });
      break;

      case "/godrej-golf-links-sector-27-greater-noida":
        applyProjectData({
          logo: "../new-assest/images/godrej-golf-links/godrej-golf-links-logo.png",
          footerBg: "../new-assest/images/godrej-golf-links/godrej-golf-links-footer-bg.webp",
          whatsapp: "https://api.whatsapp.com/send/?phone=+919899055030&text=Hi!%20Im%20Interested%20in%20Godrej%20Golf%20Link%20in%20Sector%2027,%20Greater%20Noida.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences.",
          popupImg: "../new-assest/images/godrej-golf-links/godrej-golf-links-popup.webp",
          popupLogo: "../new-assest/images/godrej-golf-links/godrej-golf-links-logo-black.png",
          video: "https://www.youtube.com/embed/80YV62_iCrg",
          tel: "+918012500400",
          telText: "+91 8012 500 400",
          address: "Sector 27, Greater Noida , Uttar Pradesh", 
          headerAlt: "Godrej Golf Links Logo",
          headerTitle: "Godrej Golf Links Logo"
        });
      break;

      case "/godrej-woods-sector-43-noida":
        applyProjectData({
          logo: "../new-assest/images/godrej-woods/godrej-woods-logo.png",
          footerBg: "../new-assest/images/godrej-woods/godrej-woods-footer-bg.webp",
          whatsapp: "https://api.whatsapp.com/send/?phone=+919899055030&text=Hi!%20Im%20Interested%20in%20Godrej%20Woods%20in%20Sector%2043,%20Noida.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences.",
          popupImg: "../new-assest/images/godrej-woods/godrej-woods-popup.webp",
          popupLogo: "../new-assest/images/godrej-woods/godrej-woods-logo-black.png",
          video: "https://www.youtube.com/embed/PRDBJ5wfrRo",
          tel: "+918012500400",
          telText: "+91 8012 500 400",
          address: "Sector 43, Noida , Uttar Pradesh", 
          headerAlt: "Godrej Woods Logo",
          headerTitle: "Godrej Woods Logo"
        });
      break;

      case "/ats-knightsbridge-sector-124-noida":
        applyProjectData({
          logo: "../new-assest/images/ats-knightsbridge/ats-knightsbridge-logo.png",
          footerBg: "../new-assest/images/ats-knightsbridge/ats-knightsbridge-footer-bg.webp",
          whatsapp: "https://api.whatsapp.com/send/?phone=+919899055030&text=Hi!%20Im%20Interested%20in%20ATS%20Knightsbridge%20in%20Sector%20124,%20Noida.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences.",
          popupImg: "../new-assest/images/ats-knightsbridge/ats-knightsbridge-popup.webp",
          popupLogo: "../new-assest/images/ats-knightsbridge/ats-knightsbridge-logo-black.png",
          video: "https://www.youtube.com/embed/_-ukkmhrSh0",
          tel: "+918012500400",
          telText: "+91 8012 500 400",
          address: "Sector 124, Noida Expressway, Uttar Pradesh",
          headerAlt: "ATS Knightsbridge Logo",
          headerTitle: "ATS Knightsbridge Logo"
        });
      break;

      case "/gulshan-dynasty-noida-sector-144-noida":
        applyProjectData({
          logo: "../new-assest/images/gulshan-dynasty/gulshan-dynasty-logo.png",
          footerBg: "../new-assest/images/gulshan-dynasty/gulshan-dynasty-footer-bg.webp",
          whatsapp: "https://api.whatsapp.com/send/?phone=+919899055030&text=Hi!%20Im%20Interested%20in%20Gulshan%20Dynasty%20in%20Sector%20144,%20Noida.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences.",
          popupImg: "../new-assest/images/gulshan-dynasty/gulshan-dynasty-popup.webp",
          popupLogo: "../new-assest/images/gulshan-dynasty/gulshan-dynasty-logo-black.webp",
          video: "https://www.youtube.com/embed/lR5S12tCJUY",
          tel: "+918012500400",
          telText: "+91 8012 500 400",
          address: "Sector 144, Noida",
          headerAlt: "Gulshan Dynasty Logo",
          headerTitle: "Gulshan Dynasty Logo"
        });
      break;

      case "/m3m-the-cullinan-sector-94-noida":
        applyProjectData({
          logo: "../new-assest/images/m3m-the-cullinan/m3m-the-cullinan-logo.png",
          footerBg: "../new-assest/images/m3m-the-cullinan/m3m-the-cullinan-footer-bg.webp",
          whatsapp: "https://api.whatsapp.com/send/?phone=+919899055030&text=Hi!%20Im%20Interested%20in%20M3M%20The%20Cullinan%20in%20Sector%2094,%20Noida.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences.",
          popupImg: "../new-assest/images/m3m-the-cullinan/m3m-the-cullinan-popup.webp",
          popupLogo: "../new-assest/images/m3m-the-cullinan/m3m-the-cullinan-logo-black.png",
          video: "https://www.youtube.com/embed/TAE73hnyUvY",
          tel: "+918012500400",
          telText: "+91 8012 500 400",
          address: "Sector 94 , Noida", 
          headerAlt: "M3M The Cullinan Logo",
          headerTitle: "M3M The Cullinan Logo"
        });
      break;

      case "/parx-laureate-sector-108-noida":
        applyProjectData({
          logo: "../new-assest/images/parx-laureate/parx-laureate-logo.png",
          footerBg: "../new-assest/images/parx-laureate/parx-laureate-footer-bg.webp",
          whatsapp: "https://api.whatsapp.com/send/?phone=+919899055030&text=Hi!%20Im%20Interested%20in%20Parx%20Laureate %20in%20Sector%20108,%20Noida.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences.",
          popupImg: "../new-assest/images/parx-laureate/parx-laureate-popup.webp",
          popupLogo: "../new-assest/images/parx-laureate/parx-laureate-logo-black.png",
          video: "https://www.youtube.com/embed/tj0qnf5fcG0",
          tel: "+918012500400",
          telText: "+91 8012 500 400",
          address: "Sector-108, Expressway, Noida", 
          headerAlt: "Parx Laureate Logo",
          headerTitle: "Parx Laureate Logo"
        });
      break;

    default:
      console.log("No matching path.");
      break;
  }
});

  