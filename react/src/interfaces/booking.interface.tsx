export interface Booking {
  bookingId: number,
  userId?: number,
  bookingTypeId?: number,
  bookingDate: string,
  totalPrice?: string,
  statusId?: number,
}

const bookingDefault: Booking = {
  bookingId: 0,
  userId: 0,
  bookingTypeId: 0,
  bookingDate: "",
  totalPrice: "",
  statusId: 0,
};

export default bookingDefault;
