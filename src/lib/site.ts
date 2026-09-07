import heroImg from "@/assets/hero.jpg";
import introImg from "@/assets/intro.jpg";
import kitchenImg from "@/assets/project-kitchen.jpg";
import bedroomImg from "@/assets/project-bedroom.jpg";
import villaImg from "@/assets/project-villa.jpg";
import officeImg from "@/assets/project-office.jpg";
import constructionImg from "@/assets/project-construction.jpg";
import featuredImg from "@/assets/featured.jpg";
import showcaseImg from "@/assets/showcase.jpg";
import beforeImg from "@/assets/before.jpg";
import afterImg from "@/assets/after.jpg";
import materialsImg from "@/assets/materials.jpg";

export const images = {
  hero: heroImg,
  intro: introImg,
  kitchen: kitchenImg,
  bedroom: bedroomImg,
  villa: villaImg,
  office: officeImg,
  construction: constructionImg,
  featured: featuredImg,
  showcase: showcaseImg,
  before: beforeImg,
  after: afterImg,
  materials: materialsImg,
};

export const business = {
  name: "AK Interiors & Civil",
  owner: "T. Murugan",
  tagline: "DESIGN. BUILD. TRANSFORM.",
  phone: "+91 91769 22419",
  phoneHref: "tel:+919176922419",
  email: "akinterior251@gmail.com",
  emailHref: "mailto:akinterior251@gmail.com",
  address: "Gandhi Street, Chennai, Tamil Nadu",
  whatsappHref:
    "https://wa.me/919176922419?text=" +
    encodeURIComponent(
      "Hello AK Interiors & Civil, I would like to enquire about an interior/civil construction project.",
    ),
};

export const navLinks = [
  { label: "Home", to: "/" },
  { label: "About", to: "/about" },
  { label: "Services", to: "/services" },
  { label: "Projects", to: "/projects" },
  { label: "Process", to: "/process" },
  { label: "Contact", to: "/contact" },
] as const;

export const services = [
  {
    n: "01",
    title: "Interior Design",
    text: "Complete interior concepts designed around your lifestyle, personality and space.",
    image: images.hero,
  },
  {
    n: "02",
    title: "Residential Interiors",
    text: "Beautiful and functional interiors for apartments, villas and independent homes.",
    image: images.bedroom,
  },
  {
    n: "03",
    title: "Commercial Interiors",
    text: "Professional interiors for offices, retail spaces, showrooms and commercial properties.",
    image: images.office,
  },
  {
    n: "04",
    title: "Civil Construction",
    text: "Reliable construction solutions with attention to structural quality and execution.",
    image: images.construction,
  },
  {
    n: "05",
    title: "Renovation & Remodeling",
    text: "Transform existing spaces into modern, functional environments.",
    image: images.after,
  },
  {
    n: "06",
    title: "Modular Kitchens",
    text: "Smart, elegant and highly functional kitchen solutions.",
    image: images.kitchen,
  },
  {
    n: "07",
    title: "Turnkey Projects",
    text: "Complete project management from planning and design to execution and finishing.",
    image: images.featured,
  },
  {
    n: "08",
    title: "Custom Interior Solutions",
    text: "Personalized solutions based on your requirements, budget and style.",
    image: images.villa,
  },
];

export type ProjectFilter =
  | "All"
  | "Residential"
  | "Commercial"
  | "Interiors"
  | "Construction";

export const projects = [
  {
    name: "Anna Nagar Residence",
    location: "Anna Nagar, Chennai",
    type: "Residential",
    groups: ["Residential", "Interiors"],
    text: "A three-bedroom home rebuilt around light, storage and quiet material contrast.",
    image: images.bedroom,
    span: "tall",
  },
  {
    name: "Besant Nagar Kitchen",
    location: "Besant Nagar, Chennai",
    type: "Modular Kitchen",
    groups: ["Residential", "Interiors"],
    text: "Matte charcoal cabinetry, quartz island and warm oak for a family of five.",
    image: images.kitchen,
    span: "short",
  },
  {
    name: "ECR Courtyard Villa",
    location: "East Coast Road, Chennai",
    type: "Villa",
    groups: ["Residential", "Construction"],
    text: "Ground-up construction with a shaded courtyard core and stone facade.",
    image: images.villa,
    span: "tall",
  },
  {
    name: "Guindy Studio Office",
    location: "Guindy, Chennai",
    type: "Office",
    groups: ["Commercial", "Interiors"],
    text: "A compact workplace with acoustic timber partitions and daylight-first planning.",
    image: images.office,
    span: "short",
  },
  {
    name: "Perungudi Apartment Block",
    location: "Perungudi, Chennai",
    type: "Construction",
    groups: ["Construction", "Commercial"],
    text: "Structural execution of a four-floor residential block, delivered on schedule.",
    image: images.construction,
    span: "tall",
  },
  {
    name: "Adyar Renovation",
    location: "Adyar, Chennai",
    type: "Renovation",
    groups: ["Residential", "Interiors"],
    text: "A tired 1990s flat reworked into a calm, contemporary living space.",
    image: images.after,
    span: "short",
  },
];

export const whyUs = [
  { n: "01", title: "End-to-End Execution", text: "Design, civil work and interiors handled by one accountable team." },
  { n: "02", title: "Quality Craftsmanship", text: "Trusted carpenters, masons and finishers who have worked with us for years." },
  { n: "03", title: "Transparent Communication", text: "Clear estimates, honest timelines and no surprise costs mid-project." },
  { n: "04", title: "Customized Design", text: "Every layout is drawn for your family, your plot and your budget." },
  { n: "05", title: "Attention to Detail", text: "Joinery, alignment and finishing checked before anything is signed off." },
  { n: "06", title: "On-Time Project Focus", text: "Sequenced site planning that keeps handover dates realistic and met." },
];

export const processSteps = [
  { n: "01", title: "Consultation", text: "Understand your requirements, lifestyle and budget.", image: images.intro },
  { n: "02", title: "Concept & Design", text: "Develop the design direction, layouts and visual concepts.", image: images.featured },
  { n: "03", title: "Planning", text: "Finalize materials, estimates, timelines and execution plans.", image: images.materials },
  { n: "04", title: "Construction", text: "Professional civil and structural execution.", image: images.construction },
  { n: "05", title: "Interiors", text: "Furniture, finishes, lighting, kitchen, wardrobes and complete interiors.", image: images.kitchen },
  { n: "06", title: "Final Handover", text: "Quality inspection and final handover of your completed space.", image: images.hero },
];

export const materials = [
  { name: "Wood", text: "Teak, oak and veneer joinery" },
  { name: "Stone", text: "Kota, granite and cladding" },
  { name: "Marble", text: "Italian and Indian slabs" },
  { name: "Metal", text: "Brushed bronze and black steel" },
  { name: "Fabric", text: "Linen, cotton and upholstery" },
  { name: "Lighting", text: "Layered profile and accent light" },
];

// Replace these with real client testimonials.
export const testimonials = [
  {
    quote:
      "They handled our construction and interiors together, so we never had to chase two different teams. The house was ready close to the date they promised.",
    name: "Ramesh & Kavitha",
    place: "Villa, East Coast Road",
  },
  {
    quote:
      "The kitchen is the best part of our flat now. Every measurement was checked twice and the finishing is genuinely clean.",
    name: "S. Priya",
    place: "Apartment, Besant Nagar",
  },
  {
    quote:
      "Murugan sir explained the estimate line by line before we started. There were no hidden costs at the end of the project.",
    name: "K. Anand",
    place: "Office, Guindy",
  },
];

// Edit these values as the studio grows.
export const stats = [
  { value: 50, suffix: "+", label: "Projects" },
  { value: 10, suffix: "+", label: "Years of Experience" },
  { value: 100, suffix: "%", label: "Commitment" },
  { value: 1, suffix: "", label: "Dedicated Team" },
];

export const projectTypes = [
  "Interior Design",
  "Residential Interior",
  "Commercial Interior",
  "Civil Construction",
  "Renovation",
  "Modular Kitchen",
  "Turnkey Project",
  "Other",
];

export const budgets = [
  "Below ₹5 Lakhs",
  "₹5–10 Lakhs",
  "₹10–20 Lakhs",
  "₹20–50 Lakhs",
  "₹50 Lakhs+",
];
