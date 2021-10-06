const getWindowSize = () => {
  const width = window.innerWidth;
  const height = document.documentElement.clientHeight;
  return { w: width, h: height };
};

const sc = (() => {
  let scrollElement = "scrollingElement" in document ? document.scrollingElement : document.documentElement;
  let scrollPoint, prePoint, flag;
  return () => {
    scrollPoint = scrollElement.scrollTop;
    flag = prePoint > scrollPoint ? true : false;
    prePoint = scrollPoint;
    return flag;
  };
})();

const Engine = Matter.Engine,
  Render = Matter.Render,
  World = Matter.World,
  Bodies = Matter.Bodies,
  Mouse = Matter.Mouse,
  MouseConstraint = Matter.MouseConstraint;

const engine = Engine.create();

var render = Render.create({
  element: document.getElementById("canvas"),
  options: {
    width: getWindowSize().w * 2,
    height: getWindowSize().h * 2,
    background: "#fffef6",
    wireframes: false,
  },
  engine: engine,
});

//重力の設定
engine.world.gravity.x = 0;
engine.world.gravity.y = 1;

window.addEventListener("load", () => {
  setTimeout(() => {
    engine.world.gravity.y = 0;
    window.addEventListener("scroll", () => {
      if (sc()) {
        engine.world.gravity.y = 0.5;
      } else {
        engine.world.gravity.y = -0.5;
      }
      setTimeout(() => (engine.world.gravity.y = 0), 100);
    });
  }, 800);
});

// オブジェクトの作成
const windowSize = getWindowSize();
const w = windowSize.w * 2,
  h = windowSize.h * 2;

const option = {
  isStatic: false, //外力を加えても動かない
  density: 0.001, //質量　デフォ0.001
  friction: 0, //摩擦係数　デフォ0.1
  frictionAir: 0, //空気抵抗 デフォ0.01
  restitution: 0.5, //　反発係数　デフォ0 　範囲(0~1)
  render: {
    fillStyle: "",
    strokeStyle: "",
    lineWidth: 0,
  },
};

const colorList = ["#D6A3DC", "#F7DB70", "#EABEBF", "#75CCE8", "#A5DEE5"];
const rand = (n) => Math.floor(Math.random() * n);
const randSize = (n) => Math.floor(Math.random() * (n / 5));

const ballList = [...new Array(5).keys()].map((index) => {
  const circleOpt = { ...option };
  circleOpt.render.fillStyle = colorList[index];
  const size = randSize(w);
  const box = Bodies.circle(rand(w), rand(h), size, circleOpt);
  return box;
});

const ceiling = Bodies.rectangle(w / 2 - 10, -231, w * 2, 60, { isStatic: true });
const ground = Bodies.rectangle(w / 2 - 10, h + 230, w * 2, 60, { isStatic: true });
const wall1 = Bodies.rectangle(-230, h / 2, 60, h * 2, { isStatic: true });
const wall2 = Bodies.rectangle(w + 230, h / 2, 60, h * 2, { isStatic: true });

//マウスドラッグ
const mousedrag = MouseConstraint.create(engine, {
  mouse: Mouse.create(render.canvas),

  constraint: {
    render: {
      visible: true,
    },
  },
});

// worldにオブジェクトを追加
World.add(engine.world, [...ballList, ceiling, ground, wall1, wall2, mousedrag]);
Engine.run(engine);
Render.run(render);
