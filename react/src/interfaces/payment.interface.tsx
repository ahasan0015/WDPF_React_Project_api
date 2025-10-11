export interface Payment {
  paymentId: number,
  bookingId?: number,
  amount?: string,
  paymentDate: string,
  paymentMethodId?: number,
  paymentStatusId?: number,
}

const paymentDefault: Payment = {
  paymentId: 0,
  bookingId: 0,
  amount: "",
  paymentDate: "",
  paymentMethodId: 0,
  paymentStatusId: 0,
};

export default paymentDefault;
