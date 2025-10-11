export interface BookingFlight {
  id: number,
  bookingId?: number,
  flightId?: number,
  seatClassId?: number,
  price?: string,
}

const bookingFlightDefault: BookingFlight = {
  id: 0,
  bookingId: 0,
  flightId: 0,
  seatClassId: 0,
  price: "",
};

export default bookingFlightDefault;
