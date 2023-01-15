const cardsContainer = document.querySelector(".card-carousel");
const cardsController = document.querySelector(".card-carousel + .card-controller")

class DraggingEvent {
    constructor(target = undefined) {
        this.target = target;
    }

    event(callback) {
        let handler;

        this.target.addEventListener("mousedown", e => {
            e.preventDefault()

            handler = callback(e)

            window.addEventListener("mousemove", handler)

            document.addEventListener("mouseleave", clearDraggingEvent)

            window.addEventListener("mouseup", clearDraggingEvent)

            function clearDraggingEvent() {
                window.removeEventListener("mousemove", handler)
                window.removeEventListener("mouseup", clearDraggingEvent)

                document.removeEventListener("mouseleave", clearDraggingEvent)

                handler(null)
            }
        })

        this.target.addEventListener("touchstart", e => {
            handler = callback(e)

            window.addEventListener("touchmove", handler)

            window.addEventListener("touchend", clearDraggingEvent)

            document.body.addEventListener("mouseleave", clearDraggingEvent)

            function clearDraggingEvent() {
                window.removeEventListener("touchmove", handler)
                window.removeEventListener("touchend", clearDraggingEvent)

                handler(null)
            }
        })
    }

    // Get the distance that the user has dragged
    getDistance(callback) {
        function distanceInit(e1) {
            let startingX, startingY;

            if ("touches" in e1) {
                startingX = e1.touches[0].clientX
                startingY = e1.touches[0].clientY
            } else {
                startingX = e1.clientX
                startingY = e1.clientY
            }


            return function (e2) {
                if (e2 === null) {
                    return callback(null)
                } else {

                    if ("touches" in e2) {
                        return callback({
                            x: e2.touches[0].clientX - startingX,
                            y: e2.touches[0].clientY - startingY
                        })
                    } else {
                        return callback({
                            x: e2.clientX - startingX,
                            y: e2.clientY - startingY
                        })
                    }
                }
            }
        }

        this.event(distanceInit)
    }
}


class CardCarousel extends DraggingEvent {
    constructor(container, controller = undefined) {
        super(container)

        // DOM elements
        this.container = container
        this.controllerElement = controller
        this.cards = container.querySelectorAll(".card")

        // Carousel data
        this.centerIndex = (this.cards.length - 1) / 2;
        this.cardWidth = this.cards[0].offsetWidth / this.container.offsetWidth * 100
        this.xScale = {};

        // Resizing
        window.addEventListener("resize", this.updateCardWidth.bind(this))

        if (this.controllerElement) {
            this.controllerElement.addEventListener("keydown", this.controller.bind(this))
        }


        // Initializers
        this.build()

        // Bind dragging event
        super.getDistance(this.moveCards.bind(this))
    }

    updateCardWidth() {
        this.cardWidth = this.cards[0].offsetWidth / this.container.offsetWidth * 100

        this.build()
    }

    build(fix = 0) {
        for (let i = 0; i < this.cards.length; i++) {
            const x = i - this.centerIndex;
            const scale = this.calcScale(x)
            const scale2 = this.calcScale2(x)
            const zIndex = -(Math.abs(i - this.centerIndex))

            const leftPos = this.calcPos(x, scale2)


            this.xScale[x] = this.cards[i]

            this.updateCards(this.cards[i], {
                x: x,
                scale: scale,
                leftPos: leftPos,
                zIndex: zIndex
            })
        }
    }


    controller(e) {
        const temp = {...this.xScale};

        if (e.keyCode === 39) {
            // Left arrow
            for (let x in this.xScale) {
                const newX = (parseInt(x) - 1 < -this.centerIndex) ? this.centerIndex : parseInt(x) - 1;

                temp[newX] = this.xScale[x]
            }
        }

        if (e.keyCode == 37) {
            // Right arrow
            for (let x in this.xScale) {
                const newX = (parseInt(x) + 1 > this.centerIndex) ? -this.centerIndex : parseInt(x) + 1;

                temp[newX] = this.xScale[x]
            }
        }

        this.xScale = temp;

        for (let x in temp) {
            const scale = this.calcScale(x),
                scale2 = this.calcScale2(x),
                leftPos = this.calcPos(x, scale2),
                zIndex = -Math.abs(x)

            this.updateCards(this.xScale[x], {
                x: x,
                scale: scale,
                leftPos: leftPos,
                zIndex: zIndex
            })
        }
    }

    calcPos(x, scale) {
        let formula;

        if (x < 0) {
            formula = (scale * 100 - this.cardWidth) / 2

            return formula

        } else if (x > 0) {
            formula = 100 - (scale * 100 + this.cardWidth) / 2

            return formula
        } else {
            formula = 100 - (scale * 100 + this.cardWidth) / 2

            return formula
        }
    }

    updateCards(card, data) {
        if (data.x || data.x == 0) {
            card.setAttribute("data-x", data.x)
        }

        if (data.scale || data.scale == 0) {
            card.style.transform = `scale(${data.scale})`

            if (data.scale == 0) {
                card.style.opacity = data.scale
            } else {
                card.style.opacity = 1;
            }
        }

        if (data.leftPos) {
            card.style.left = `${data.leftPos}%`
        }

        if (data.zIndex || data.zIndex == 0) {
            if (data.zIndex == 0) {
                card.classList.add("highlight")
            } else {
                card.classList.remove("highlight")
            }

            card.style.zIndex = data.zIndex
        }
    }

    calcScale2(x) {
        let formula;

        if (x <= 0) {
            formula = 1 - -1 / 5 * x

            return formula
        } else if (x > 0) {
            formula = 1 - 1 / 5 * x

            return formula
        }
    }

    calcScale(x) {
        const formula = 1 - 1 / 5 * Math.pow(x, 2)

        if (formula <= 0) {
            return 0
        } else {
            return formula
        }
    }

    checkOrdering(card, x, xDist) {
        const original = parseInt(card.dataset.x)
        const rounded = Math.round(xDist)
        let newX = x

        if (x !== x + rounded) {
            if (x + rounded > original) {
                if (x + rounded > this.centerIndex) {

                    newX = ((x + rounded - 1) - this.centerIndex) - rounded + -this.centerIndex
                }
            } else if (x + rounded < original) {
                if (x + rounded < -this.centerIndex) {

                    newX = ((x + rounded + 1) + this.centerIndex) - rounded + this.centerIndex
                }
            }

            this.xScale[newX + rounded] = card;
        }

        const temp = -Math.abs(newX + rounded)

        this.updateCards(card, {zIndex: temp})

        return newX;
    }

    moveCards(data) {
        let xDist;

        if (data != null) {
            this.container.classList.remove("smooth-return")
            xDist = data.x / 250;
        } else {


            this.container.classList.add("smooth-return")
            xDist = 0;

            for (let x in this.xScale) {
                this.updateCards(this.xScale[x], {
                    x: x,
                    zIndex: Math.abs(Math.abs(x) - this.centerIndex)
                })
            }
        }

        for (let i = 0; i < this.cards.length; i++) {
            const x = this.checkOrdering(this.cards[i], parseInt(this.cards[i].dataset.x), xDist),
                scale = this.calcScale(x + xDist),
                scale2 = this.calcScale2(x + xDist),
                leftPos = this.calcPos(x + xDist, scale2)


            this.updateCards(this.cards[i], {
                scale: scale,
                leftPos: leftPos
            })
        }
    }
}

const carousel = new CardCarousel(cardsContainer)
