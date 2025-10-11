export interface Passenger {
  passengerId: number,
  bookingId?: number,
  name: string,
  age?: string,
  passportNumber?: string,
  nationality?: string,
}

const passengerDefault: Passenger = {
  passengerId: 0,
  bookingId: 0,
  name: "",
  age: "",
  passportNumber: "",
  nationality: "",
};

export default passengerDefault;
