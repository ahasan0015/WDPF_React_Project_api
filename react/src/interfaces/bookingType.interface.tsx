export interface BookingType {
  bookingTypeId: number,
  typeName: string,
}

const bookingTypeDefault: BookingType = {
  bookingTypeId: 0,
  typeName: "",
};

export default bookingTypeDefault;
