export interface BookingStatu {
  statusId: number,
  statusName: string,
}

const bookingStatuDefault: BookingStatu = {
  statusId: 0,
  statusName: "",
};

export default bookingStatuDefault;
